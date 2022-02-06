var express = require("express");
var app = express();
var cors = require("cors");

app.use(cors());
app.use(express.static(__dirname));

app.get('/', function(req, res) {
    res.sendFile('./index.html');
});

app.listen(3001, () => {
    console.log("Servidor rodando em http://localhost:3001");
})

