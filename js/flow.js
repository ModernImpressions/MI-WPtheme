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
                            label: 'I need to order supplies',
                            value: 'order_supplies'
                        }),
                        new FlowForm.ChoiceOption({
                            label: 'I need to submit a meter reading',
                            value: 'submit_meter'
                        }),
                    ],
                    jump: {
                        technical_issue: 'technical_issue',
                        account_issue: 'account_issue',
                        order_supplies: 'order_supplies',
                        submit_meter: 'submit_meter'
                    }
                }),
                new FlowForm.QuestionModel({
                    id: 'technical_issue',
                    tagline: 'Submit issue > Step 1/2',
                    title: 'Have you checked our Support Documentation? You can also search in the bar at the top of this page.',
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
                            value: 'support_no'
                        }),
                    ],
                    jump: {
                        support_no: 'support_no'
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
                    id: 'order_supplies',
                    tagline: 'Supplies > Place an order',
                    title: 'I need to order supplies...',
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "You'll need your device information handy, but you can ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: 'https://www.modernimpressions.com/support/order-supplies/',
                            text: 'place a supply order.',
                            target: '_self'
                        })
                    ],
                    options: [

                    ]
                }),
                new FlowForm.QuestionModel({
                    id: 'support_no',
                    tagline: 'Submit issue > Step 2/2',
                    title: 'Please Submit a Service Call',
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "We're here to help, just ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: 'https://www.modernimpressions.com/support/place-a-service-call/',
                            text: 'Submit a Service Call',
                            target: '_self'
                        })
                    ],
                    options: [

                    ]
                }),
                new FlowForm.QuestionModel({
                    id: 'submit_meter',
                    tagline: 'Meters > Submit',
                    title: 'I need to submit a meter reading...',
                    type: FlowForm.QuestionType.MultipleChoice,
                    multiple: false,
                    required: true,
                    helpTextShow: false,
                    description: "You'll need your device information handy, but you can ",
                    descriptionLink: [
                        new FlowForm.LinkOption({
                            url: 'https://www.modernimpressions.com/support/meter-reading/',
                            text: 'Submit a Meter Reading',
                            target: '_self'
                        })
                    ],
                    options: [

                    ]
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
                            text: 'Contact Us',
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