<template>
    <div class="container">
        <p v-for="ans in this.answers">{{ans.answer}}</p>
        <ul class="message-wrap">
            <li v-for="ans in this.answers"><div class="text-wrapp">{{ans.answer}}</div></li>
        </ul>
        <label>Задайте вопрос</label>
        <form name="answersForm" style="width: 30%; text-align: center;">
            <p><label>Ваше имя: </label><input class="form-control" v-model="name" type="text" name="name"></p>
            <p><label>Вопрос:</label><textarea class="form-control" v-model="answer" name="answer"></textarea></p>
            <p><button type="button" v-on:click="sendAnswer()" class="btn-success">Отправить</button></p>
        </form>
    </div>
</template>

<script>
	import axios from 'axios';
	export default {
		name: "formAnswers",
        props: {
			dataCsrf: String
        },
        data: function () {
			return {
				name: '',
				answer: '',
                answers: [],
                token:'',
				uploadFormData: {
					"_token": this.dataCsrf,
				},
			}
		},
        methods: {
            sendAnswer() {
				axios.post('answer/add', {
					'name': this.name,
                    'answer': this.answer
				})
					.then(res => {
						console.log(res);
						this.answers.push({'answer': res.data.answer});
                    })
					.catch(error => {
						console.error(error);
					});
            }
        },
		mounted() {
			console.log('My new component mounted')
		}
	}
</script>

<style scoped>
    .message-wrap {
        list-style: none;
        width: 100%;
        margin: 0 auto;
        border: 1px solid #ccc;
        text-align: right;
        padding: 10px;
    }
    .message-wrap li {
        padding: 5px;
        width: 100%;
        margin: 15px 0;
        padding: 0;
        position: relative;
        height: 40px;
    }
    .message-wrap li .text-wrapp {
        position: absolute;
        border: 1px solid #e8e1e1;
        width: 70%;
        height: 100%;
        background: #EFEFEE;
        border-radius:50px;
        text-align: left;
    }
    .message-wrap li:nth-child(even) .text-wrapp {
        right: 0;
        background: #7392ea47;
    }
</style>