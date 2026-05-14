

//Delete a keyword
function deleteWord(element){
  var index = allKeywords.indexOf($(element).parent('.keyword').text());
  if(index !== -1){                                  
    allKeywords.splice(index, 1);
  }
  $(element).parent('.keyword').remove();
}

//Add a keyword
function addWord(word){
  if(word === undefined || word === ''){
    return;
  }
  
  allKeywords.push(word);
  
  $('#divKeywords > input[type=text]').before($('<p class="keyword">' + word + '<a class="delete" onclick="deleteWord(this)"><i class="fa fa-times" aria-hidden="true"></i></a></p>'));
  $('#txtInput').val('');
  $('#txtInput').focus();
}

//On focus out, add word
function addWordFromTextBox(){
  var val = $('#txtInput').val();
  if(val !== undefined && val !== ''){
    addWord(val);
  }
}

//On key press, check for , or ;
function checkLetter(){
  var val = $('#txtInput').val()
  if(val.length > 0){
    var letter = val.slice(-1);
    if(letter === ',' || letter === ';'){
      var word = val.slice(0,-1);
      if(word.length > 0){
        addWord(word);
      }
    }
  }
}

$('#txtInput').blur(addWordFromTextBox);
$('#txtInput').keyup(checkLetter);
$('#divKeywords').click(function(){ $('#txtInput').focus(); });