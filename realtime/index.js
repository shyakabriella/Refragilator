var express = require('express');
var app = express();
var server = require('http').createServer(app);
var http = require("http");
var io = require('socket.io')(server);
var mysql = require('mysql');

app.use(express.static(__dirname + '/client'));

app.get('/', function (req, res, next) {
    console.log(req.params)
    res.sendFile(__dirname + '/admin.html');
});

io.on('connection', function (socket) {
    console.log("hhh");
    socket.on("add_me", function(msg){
        console.log(msg);
    })

    socket.on("new_temperature", function(msg){
        console.log(msg);
    })
});

server.listen(8080, () => {
    console.log('real time refrigerat is on 8080');
});