const body = new PerfectScrollbar('body');
const content = new PerfectScrollbar('#content');

$(document).ready(function(){
    var answers;
    var mapPinInput = `<div class="map_pin_input" >
                         <input />
                       </div>`
    $('.map-pin').click(function (){
        var QuestionBox =  $(this).parent('.question-box');
        if($('.map_pin_input').length == 0 ){
            QuestionBox.append(mapPinInput)
        }
    })
    $('.next-question').click(function() {
        var reports = JSON.parse(localStorage.getItem('report'));
        var stored = JSON.parse(localStorage.getItem('answers'));
        if(reports == null){
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
                }).fail( function(err){
                    console.log(err)
                })
                storeQuestion()
            }
        }else{
            storeQuestion()
        }
    })
    $('.reset').click(function(){
        localStorage.removeItem('report');
        localStorage.removeItem('answers')
        console.log('successfully clear localstorage')
        location.reload()
    })
})

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
            var ans = {
                answer : input.value,
                question_id: ques+2, // accomodate for first two questions
                report_id : reports.report_id
            }
            stored.push(ans); // append answer to answers[Array] and store to localstorage
            localStorage.setItem('answers', JSON.stringify(stored))
        }
        if(ques+1 == currentQuestions.length){
            var storedAnswers = JSON.parse(localStorage.getItem('answers')); // get stored answers from localStorage
            var lastQuestion = storedAnswers[storedAnswers.length-1]; // get last question from stored answers 
            $('.question-box').remove()
            loadNextQuestion(lastQuestion.question_id, reports.questionaire_id)
            console.log(storedAnswers)
        }
    })
}
function loadNextQuestion(lastQuestion, questionTemplate){
    var formData = {
        lastQues: lastQuestion, 
        questionaire: questionTemplate
    }
    $.post('http://mcapp.edgeplas.com/report/next_question', formData, function (data){
        data = JSON.parse(data)
        addTemplate(data);
    }).fail( function(err){
        console.log(err)
    })                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
}

function addTemplate(template){
    var questionTemplate = `<div class="question-box mb-5">
                                <h5>${template.question}? </h5>
                                <div class="answer-box ${template.question_answer_field}">
                                    <span class="${template.icon} left"></span>
                                    <input type="text" id="1" class="input">
                                </div>
                            </div>`
    $('.questions-container').append(questionTemplate);
}