new Vue({
    el: '#sentence',
    data: {
        inputs: {
            judge_name: '',
        }
    },
    methods: {
        /**
         * フォーム送信時
         */
        submit: function (e) {
            e.preventDefault();
            this.loading = true
            console.log(this.inputs.judge_name)
            axios.post('_ajax/judge/search/', this.inputs)
                .then(response => {
                    location.href = "/mypage/judge/id=" + response.data.id
                })
                .catch(errors => {
                    alert("※該当する審査員は見つかりませんでした。")
                })
        },
    }
})