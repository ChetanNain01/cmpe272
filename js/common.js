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
    lastVisited.splice(0, 1);
    console.log(lastVisited);
    setCookie('lastVisited', lastVisited);
}

function handleCardClick(value){
  setLastVisitedCookie(value);
  window.location.href = `/pdp.php?id=${value}`;
}
