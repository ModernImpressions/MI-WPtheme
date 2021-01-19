/*
    Copyright (c) 2020 - present, DITDOT Ltd. - MIT Licence
    https://github.com/ditdot-dev/vue-flow-form
    https://www.ditdot.hr/en
*/

var app = new Vue({
    el: '#app',
    template: '#app-template',
    data: function() {
        return {
            loading: false,
            completed: false,
            language: new FlowForm.LanguageModel(),
            // Create question list with QuestionModel instances
            questions: [
                new FlowForm.QuestionModel({
                    id: 'multiple_choice',
                    tagline: "Welcome to our Support Center!",
                    title: 'Hi 👋, how can we help you today?',
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    options: [
                        new FlowForm.ChoiceOption({
                            label: 'I have a technical issue',
                            value: 'technical_issue'
                        }),
                        new FlowForm.ChoiceOption({
                            label: 'I need to update account information',
                            value: 'account_issue'
                        }),
                        new FlowForm.ChoiceOption({
                            label: 'I wish to check my ticket status',
                            value: 'enter_ticket'
                        }),
                    ],
                    jump: {
                        technical_issue: 'technical_issue',
                        account_issue: 'account_issue',
                        enter_ticket: 'enter_ticket'
                    }
                }),
                new FlowForm.QuestionModel({
                    id: 'technical_issue',
                    tagline: 'Submit issue > Step 1/3',
                    title: 'Have you checked our Support Documentation?',
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "Find solutions to common problems in our",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: 'https://www.modernimpressions.com/docs/',
                            text: ' Support Docs',
                            target: '_self'
                        })
                    ],
                    options: [
                        new FlowForm.ChoiceOption({
                            label: 'Yes, but still couldn’t find the answer.',
                            value: 'faq_no'
                        }),
                    ],
                    jump: {
                        faq_no: 'faq_no'
                    }
                }),
                new FlowForm.QuestionModel({
                    id: 'account_issue',
                    tagline: 'Account Updates > Step 1/2',
                    title: 'I wish to update my Account Information',
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "If you wish to update the contact information you can do so here: ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: 'https://www.modernimpressions.com/support/change-contact-information/',
                            text: ' Change Contact Infomation',
                            target: '_self'
                        })
                    ],
                    options: [
                        new FlowForm.ChoiceOption({
                            label: 'I need to make other account changes...',
                            value: 'account_no'
                        }),
                    ],
                    jump: {
                        account_no: 'account_no'
                    }
                }),
                new FlowForm.QuestionModel({
                    id: 'enter_ticket',
                    tagline: 'Support page > Ticket status',
                    title: 'Please enter your 6-digit code',
                    subtitle: 'You received this when you reported your problem',
                    type: FlowForm.QuestionType.Number,
                    multiple: false,
                    required: true,
                    mask: '#-#-#-#-#-#',
                    placeholder: '#-#-#-#-#-#',
                    jump: {
                        _other: '_submit'
                    }
                }),
                new FlowForm.QuestionModel({
                    id: 'faq_no',
                    tagline: 'Submit issue > Step 2/3',
                    title: 'Please describe your problem',
                    type: FlowForm.QuestionType.LongText,
                    required: true,
                    placeholder: 'Start typing here...',
                }),
                new FlowForm.QuestionModel({
                    id: 'account_no',
                    tagline: 'Account Updates > Step 2/2',
                    title: 'I need to make other account changes...',
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "If you have other changes to make, please call our office 1-800-840-2554 or ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: 'https://www.modernimpressions.com/contact/',
                            text: ' Contact Us',
                            target: '_self'
                        })
                    ],
                    options: [

                    ]
                })
            ]
        }
    },
    methods: {
        /* eslint-disable-next-line no-unused-vars */
        onComplete: function(completed, questionList) {
            // This method is called whenever the "completed" status is changed.
            this.completed = completed

            // Set `submitted` to true so the form knows not to allow back/forward
            // navigation anymore.
            this.$refs.flowform.submitted = true

            this.onSendData()
        },

        onSendData: function() {
            const self = this
            const data = this.getData()

            this.loading = true

            /* eslint-disable-next-line no-unused-vars */

            /*
          You can use Fetch API to send the data to your server, eg.:
  
          fetch(url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
        */

            setTimeout(() => {
                self.loading = false
            }, 1500)
        },

        getData: function() {
            const data = {
                questions: [],
                answers: []
            }

            this.questions.forEach(question => {
                if (question.title) {
                    let answer = question.answer
                    if (typeof answer === 'object') {
                        answer = answer.join(', ')
                    }

                    data.questions.push(question.title)
                    data.answers.push(answer)
                }
            })

            return data
        },

        getTicket: function() {
            return Math.floor(Math.random() * (999999 - 100000) + 100000).toString()
        }
    }
});