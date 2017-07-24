
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function calledNumberFilter_112() {
  var is_activated = getCookie('called-number-112');
  if(is_activated == 'false'){
      setCookie('called-number-112','true',365);
  }else{
      setCookie('called-number-112','false',365);
  }
  displayElements();
}

function calledNumberFilter_18() {
  var is_activated = getCookie('called-number-18');
  if(is_activated == 'false'){
      setCookie('called-number-18','true',365);
  }else{
      setCookie('called-number-18','false',365);
  }
  displayElements();
}

function calledNumberFilter_17(){
  var is_activated = getCookie('called-number-17');
  if(is_activated == 'false'){
      setCookie('called-number-17','true',365);
  }else{
      setCookie('called-number-17','false',365);
  }
  displayElements();
}

function calledNumberFilter_15() {
  var is_activated = getCookie('called-number-15');
  if(is_activated == 'false'){
      setCookie('called-number-15','true',365);
  }else{
      setCookie('called-number-15','false',365);
  }
  displayElements();
}

function calledNumberFilter_114() {
  var is_activated = getCookie('called-number-114');
  if(is_activated == 'false'){
      setCookie('called-number-114','true',365);
  }else{
      setCookie('called-number-114','false',365);
  }
  displayElements();
}

function calledNumberFilter_194() {
  var is_activated = getCookie('called-number-194');
  if(is_activated == 'false'){
      setCookie('called-number-194','true',365);
  }else{
      setCookie('called-number-194','false',365);
  }
  displayElements();
}

function calledNumberFilter_196() {
  var is_activated = getCookie('called-number-196');
  if(is_activated == 'false'){
      setCookie('called-number-196','true',365);
  }else{
      setCookie('called-number-196','false',365);
  }
  displayElements();
}

function callStatusFilter_ongoing(){
  var is_activated = getCookie('ongoing');
  if(is_activated == 'false'){
      setCookie('ongoing','true',365);
  }else{
      setCookie('ongoing','false',365);
  }
  displayElements();
}

function callStatusFilter_ended(){
  var is_activated = getCookie('ended');
  if(is_activated == 'false'){
      setCookie('ended','true',365);
  }else{
      setCookie('ended','false',365);
  }
  displayElements();
}

function callStatusFilter_waiting(){
  var is_activated = getCookie('waiting');
  if(is_activated == 'false'){
      setCookie('waiting','true',365);
  }else{
      setCookie('waiting','false',365);
  }
  displayElements();
}

function interventionType_filter(value){
  setCookie('emergencyType',value,365);
  displayElements();
}

function operatorType_filter(value){
  setCookie('operatorType',value,365);
  displayElements();
}

function state_filter(){
  var is_activated = getCookie('state');
  if(is_activated == 'false'){
      setCookie('state','true',365);
  }else{
      setCookie('state','false',365);
  }
  displayElements();
}

function picture_filter(){
  var is_activated = getCookie('picture');
  if(is_activated == 'false'){
      setCookie('picture','true',365);
  }else{
      setCookie('picture','false',365);
  }
  displayElements();
}

function nature_filter(){
  var is_activated = getCookie('nature');
  if(is_activated == 'false'){
      setCookie('nature','true',365);
  }else{
      setCookie('nature','false',365);
  }
  displayElements();
}

function location_filter(){
  var is_activated = getCookie('location');
  if(is_activated == 'false'){
      setCookie('location','true',365);
  }else{
      setCookie('location','false',365);
  }
  displayElements();
}

function identity_filter(){
  var is_activated = getCookie('identity');
  if(is_activated == 'false'){
      setCookie('identity','true',365);
  }else{
      setCookie('identity','false',365);
  }
  displayElements();
}

function ongoingCallsFirst(){
  var ongoing_tickets = document.getElementsByClassName('ongoing');
  var all_tickets = document.getElementsByClassName('ticket');


  if(getCookie('ongoing_first_filter')=='true'){
    var oldest_ticket = all_tickets[0].className.split(' ')[3];
    var parent = all_tickets[0].parentNode;

    for (var i = 1; i < all_tickets.length+1; i++) {
        var collapsible = document.getElementById('collapse'+(i));

      //commence pas forcément à 1 si on limitte les tickets affichés (ticket 523 à 623 par ex)
      var current_ticket = document.getElementsByClassName(i);
      parent.insertBefore(collapsible,parent.firstChild);
      parent.insertBefore(current_ticket[0],parent.firstChild);
    }
    setCookie('ongoing_first_filter','false',365);
  }else{

    //filtre activé par défaut
    for (var i = 0; i < ongoing_tickets.length; i++) {


        var parent = ongoing_tickets[i].parentNode;
        var grand_parent = parent.parentNode;

        var ticketNumber = ongoing_tickets[i].className.split(' ')[3];
        if(ticketNumber != ''){
          var collapsible = document.getElementById('collapse'+(ticketNumber));
          parent.insertBefore(collapsible,parent.firstChild);
        }
          grand_parent.insertBefore(parent,grand_parent.firstChild);
          //  parent.insertBefore(tickets[i], parent.firstChild);

    }
          setCookie('ongoing_first_filter','true',365);
  }
}

function ongoingCallsFirst_onload(){

  var ongoing_tickets = document.getElementsByClassName('ongoing');
  var all_tickets = document.getElementsByClassName("ticket");

  if(getCookie('ongoing_first_filter')=='false'){
    var oldest_ticket = all_tickets[0].className.split(' ')[3];
    var parent = all_tickets[0].parentNode;

    for (var i = 1; i < all_tickets.length+1; i++) {
      var collapsible = document.getElementById('collapse'+(i));
      //commence pas forcément à 1 si on limitte les tickets affichés (ticket 523 à 623 par ex)
      var current_ticket = document.getElementsByClassName(i);
      parent.insertBefore(collapsible,parent.firstChild);
      parent.insertBefore(current_ticket[0],parent.firstChild);
    }
  }else{
    for (var i = 0; i < ongoing_tickets.length; i++) {
        var collapsible = document.getElementById('collapse'+(i+1));
        var parent = ongoing_tickets[i].parentNode;
        var grand_parent = parent.parentNode;

        var ticketNumber = ongoing_tickets[i].className.split(' ')[3];
        if(ticketNumber != ''){
          var collapsible = document.getElementById('collapse'+(ticketNumber));
          parent.insertBefore(collapsible,parent.firstChild);
        }
          grand_parent.insertBefore(parent,grand_parent.firstChild);
          //  parent.insertBefore(tickets[i], parent.firstChild);

    }
  }
}

function displayValRange(newVal){
  document.getElementById("rangeDisplay").innerHTML=newVal+'km';
}

function displayValPerimetre(newVal){
  document.getElementById("perimetreDisplay").innerHTML=newVal+'km';
}

function getCalledNumber(ticket){
  var number = ticket.className.split(' ')[5];
  return number;
}

function getTicketStatus(ticket){
  var status = ticket.className.split(' ')[4];
  return status;
}

function getEmergencyType(ticket){
  var type = ticket.className.split(' ')[6];
  return type;
}


function displayElements(){

//tickets items display management
var state_items = document.getElementsByClassName('state');
    for(var i = 0; i <state_items.length; i++){
      if(getCookie('state') == 'false'){
          state_items[i].style.display = 'none';
      }else{
          state_items[i].style.display = 'inline-block';
        }
      }

var picture_items = document.getElementsByClassName('picture');
for(var i = 0; i <picture_items.length; i++){
  if(getCookie('picture') == 'false'){
      picture_items[i].style.display = 'none';
  }else{
      picture_items[i].style.display = 'inline-block';
    }
  }

var nature_items = document.getElementsByClassName('nature');
for(var i = 0; i <nature_items.length; i++){
  if(getCookie('nature') == 'false'){
      nature_items[i].style.display = 'none';
  }else{
      nature_items[i].style.display = 'inline-block';
    }
  }

var location_items = document.getElementsByClassName('location');
for(var i = 0; i <location_items.length; i++){
  if(getCookie('location') == 'false'){
      location_items[i].style.display = 'none';
  }else{
      location_items[i].style.display = 'inline-block';
    }
  }

var identity_items = document.getElementsByClassName('identity');
for(var i = 0; i <identity_items.length; i++){
  if(getCookie('identity') == 'false'){
      identity_items[i].style.display = 'none';
  }else{
      identity_items[i].style.display = 'inline-block';
    }
  }

//tickets display management
var all_tickets = document.getElementsByClassName("ticket");
    for(var i = 0; i <all_tickets.length; i++){
      var called_number = getCalledNumber(all_tickets[i]);
      var status = getTicketStatus(all_tickets[i]);
      var type = getEmergencyType(all_tickets[i]);
      if((getCookie('emergencyType') == 'ALL' || getCookie('emergencyType') == '' )&& (getCookie('operatorType') == 'OP_ALL' || getCookie('operatorType') == '')){
        if(getCookie(called_number)=='false' || getCookie(status)=='false'){
            all_tickets[i].style.display = 'none';
        }else {
            all_tickets[i].style.display = 'block';
        }
      }else if(getCookie('operatorType') == 'OP_ALL' || getCookie('operatorType') == ''){
        if(getCookie(called_number)=='false' || getCookie(status)=='false' || type != getCookie('emergencyType')){
            all_tickets[i].style.display = 'none';
        }else {
            all_tickets[i].style.display = 'block';
        }
      }else if(getCookie('emergencyType') == 'ALL' || getCookie('emergencyType') == '' ){
        if(getCookie(called_number)=='false' || getCookie(status)=='false' || type != getCookie('operatorType')){
            all_tickets[i].style.display = 'none';
        }else {
            all_tickets[i].style.display = 'block';
        }
      }else{
        if(getCookie(called_number)=='false' || getCookie(status)=='false' || type != getCookie('emergencyType') || type != getCookie('operatorType')){
            all_tickets[i].style.display = 'none';
        }else {
            all_tickets[i].style.display = 'block';
        }
      }
    }
}
