const body = new PerfectScrollbar('body');
const content = new PerfectScrollbar('#content');

var questionBox = document.getElementsByClassName('question-box');
console.log(questionBox)
$(document).ready(function(){
    loadQuestion();
    pageLoaded();
    var answers;
    var mapPinInput = `<div class="map_pin_input" >
                         <input />
                       </div>`
    $('.submit').click(function() {
        var reports = JSON.parse(localStorage.getItem('report'));
        var stored = JSON.parse(localStorage.getItem('answers'));
        console.log(reports)
        if(reports === null){
            /**
             *@TODO add onchange and update
             */
            var _title = $('#title').val()
            // crate a new report
            if( _title != ''){
                var newReport = { 
                    title: _title,
                    completed: 0
                }
                answers = [] // instantiate answer array
                localStorage.setItem('answers', JSON.stringify(answers))
                // create a new report, store report_id and questionaire_id 
                $.post('http://mcapp.edgeplas.com/create_report', newReport, function (data){
                    data = JSON.parse(data)
                    newReport.report_id = data.report_id;
                    newReport.questionaire_id = data.questionaire_id;
                    localStorage.setItem('report', JSON.stringify(newReport))
                    storeQuestion()
                }).fail( function(err){
                    console.log(err)
                })
            }
        }
    })
    $('.sidebar-box').click(function(){
        $(this).toggleClass('expanded')
    })
    $('.report-list__item').click(function(e){
        if(e.target.tagName !== 'SPAN'){
            if($(this).hasClass('expanded')){
                $(this).removeClass('expanded')
            }else{
                $('.report-list__item').removeClass('expanded')
                $(this).addClass('expanded')
            }
        }
    })
})

function pageLoaded(){
    localStorage.removeItem('report');
    localStorage.removeItem('answers')
    console.log('successfully clear localstorage')
}

function loadQuestion(){
    $.get('http://mcapp.edgeplas.com/report/get_question', function (data){
        data = JSON.parse(data)
        $('.loader-overlay').addClass('disabled');
        data.forEach(function(item){
            if(item.active === "1"){
                addTemplate(item);
            }
        })
    }).fail( function(err){
        console.log(err)
    }) 
}
function storeQuestion(){
    var reports = JSON.parse(localStorage.getItem('report'));
    var stored = JSON.parse(localStorage.getItem('answers'));

    var currentQuestions = $('.question-box:not(.header)') //get .question-box not header question
    currentQuestions.map(function(ques){
        var ansBox = currentQuestions[ques].children[1];
        // find input element in .question-box
        for (var i = 0; i < ansBox.childNodes.length; i++) {
            if (ansBox.childNodes[i].className == "input") {
                input = ansBox.childNodes[i];
                break;
            }        
        }
        if(input.value !== ''){
            var questionId = currentQuestions[ques].dataset.question
            var ans = {
                answer : input.value,
                question_id: questionId,
                report_id : reports.report_id
            }
            stored.push(ans); // append answer to answers[Array] and store to localstorage
            localStorage.setItem('answers', JSON.stringify(stored))
        }
        if(ques+1 == currentQuestions.length){
            var storedAnswers = JSON.parse(localStorage.getItem('answers')); // get stored answers from localStorage
            console.log(storedAnswers)
            saveAnswers(storedAnswers)
        }
    })
}

function saveAnswers(dataArray){
    var postData = {
        data: dataArray
    }
    console.log('Data Array is ')
    console.log(dataArray);
    $.ajax({
        type: 'POST',
        url: 'http://mcapp.edgeplas.com/report/save_report',
        data: postData, 
        success:function(response){
            console.log(JSON.parse(response))
        }})
}

function addTemplate(template){
    var questionTemplate = `<div class="question-box mb-5" data-question="${template.question_id}">
                                <h5>${template.question}? </h5>
                                <div class="answer-box ${template.question_answer_field}">
                                    <span class="${template.icon} left"></span>
                                    <input type="text" id="1" class="input">
                                </div>
                            </div>`
    $('.questions-container').append(questionTemplate);
}