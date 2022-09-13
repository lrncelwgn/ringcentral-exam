const express = require('express')
const app = express()
const port = 3000

const cors = require('cors');
app.use(cors());

app.get('/ringcentral', (req, res) => {
  res.status(200).send({
	'http_response' : res.statusCode,
    'http_headers' : req.headers,
    'date_time' : getDateTime(),
  })
})

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`)
})  

function getDateTime() {
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    return date+' '+time;
} 