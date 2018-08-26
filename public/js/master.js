function scrollToTop() {
  window.scrollTo(0, 0);
  // document.body.scrollTop = 0; //The same
}

function scrollToTopImageVisibility() {
  setInterval(function () {
    if(document.body.scrollTop === 0){
      document.getElementById('ScrollToTop_Image').style.display = "none";
    }
    else{
      document.getElementById('ScrollToTop_Image').style.display = "block";
    }
  }, 100);
}
