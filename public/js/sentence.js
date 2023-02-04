new Vue({
    el: '#sentence',
    data: {
        state: 'ready',
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
        getHeaderText: function (e) {
            if (this.state == 'ready') {
                return '学習準備';
            } else if (this.state == 'now') {
                return '学習中';
            } else if (this.state == 'end') {
                return '学習終了';
            }
        },
        changeStateToNow: function (e) {
            this.state = 'now'
        }
    },

})