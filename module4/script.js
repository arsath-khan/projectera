(function () {

var names = ["Yaakov", "john", "Jen", "Jason", "Paul", "Frank", "Larry", "Paula", "Laura", "jim"];

for (var i = 0; i < names.length; i++) {
  var firstletter = names[i].charAt(0);

  if (firstletter === 'j'|| firstletter ==='J') {
    byespeaker(names[i]);
  }
  else {
    hellospeaker(names[i]);
  }
}

})();