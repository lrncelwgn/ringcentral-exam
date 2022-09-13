<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <button class="btn btn-lg btn-success" @click="submit">Ping</button>
            </div>
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table table-hover table-striped table-bordered table-responsive mt-4">
                    <thead>
                        <tr>
                            <th style="width: 30%;">Date & Time</th>
                            <th style="width: 70%;">HTTP Response</th>
                        </tr>
                    </thead>
                    <tbody id="table-list">
                        <tr v-for="item in pings" :key="item.id">
                            <td>{{ item.date_time }}</td>
                            <td>{{ item.http_response }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col1"></div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            pings: {},
        }
    },
    methods: {
        submit() {
            fetch("http://localhost:3000/ringcentral", {
                method: "GET"
            }).then((result) => {
                if (result.status != 200) {
                    alert('Failed');
                    throw new Error("Bad Server Response");
                }
                return result.text();
            }).then((response) => {
                var data = JSON.parse(response);
                var valDate = data.date_time;
                var valRes = 'StatusCode: ' + data.http_response + " " + JSON.stringify(data.http_headers);
                console.log(data.http_headers);

                axios.post('/store', {
                    date_time: valDate,
                    http_response: valRes
                })
                    .then(function (response) {
                        document.getElementById("table-list").innerHTML +=
                            "<td>" + valDate + "</td><td>" + valRes + "</td>";
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            })
        },
        getPing() {
            axios.get('/list')
                .then((response) => {
                    this.pings = response.data.pings
                })
        }
    },
    created() {
        this.getPing()
    }
}
</script>
