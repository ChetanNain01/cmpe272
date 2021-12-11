function setCookie(cookiename, cookievalue, hours = 24*2) {
    var date = new Date();
    date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
    document.cookie = cookiename + "=" + cookievalue + "; path=/;expires = " + date.toGMTString();
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

function setLastVisitedCookie(value){
    lastVisited = getCookie('lastVisited');
    lastVisited = lastVisited.length ? lastVisited?.split(','): [];
    lastVisited.push(value);
    if(lastVisited.length == 6) {
        lastVisited.splice(0, 1);
    }
    //lastVisited.splice(0, 1);
    console.log(lastVisited);
    setCookie('lastVisited', lastVisited);
}

function handleCardClick(value, name, image){
  setLastVisitedCookie(value);
  window.location = `/pullo/pdp.php?id=${value}`;
  increaseVisitCount(name, image);
}


function increaseVisitCount (name, image) {
  const currentURL = window.location.href;
  httpPost('increaseVisits', {name: 'Pullo', productName: name, imageUrl: image, emailId: sessionStorage.getItem('emailId'), origin: currentURL});
} 

function preparePage(){
  const params = new URLSearchParams(window.location.search);
  sessionStorage.setItem('emailId',  params.get('emailId'))
}


function handleReview(name, image){
  const review = document.getElementById('providedReview').value;
  const rating = document.getElementById('selectRating').value;
  const currentURL = window.location.href;
  httpPost('handleReview', {name: 'Pullo', productName: name, review: review, rating: rating, imageUrl: image, emailId: sessionStorage.getItem('emailId'), origin: currentURL});
  handleVisits('Reviewed');
  document.getElementById('providedReview').value = '';
  alert('Review has been submitted successfully.');
}

function handleVisits(activity) {
  const emailId = sessionStorage.getItem('emailId');
  const url = window.location.href;
  httpPost('traceActivity', {name: 'Pullo', origin: url, emailId, emailId, activity: activity});
}


function pdpInit() {
  const activity = 'visited';
  handleVisits(activity);
}

function httpPost(action, payload) {
  $.ajax({
      type:"POST",
      url: "http://localhost/MarketPlace/php/api.php",
      data: {
      action,
      ...payload
      },
      success: function(res){
        return res;
      },
      error: function(){
          alert('Somthing wents wrong, Please try again later!')
      }
  });
}