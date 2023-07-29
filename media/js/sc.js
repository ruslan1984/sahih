(() => {

const loadScript = async (url)=>{
    return await fetch(url)
    .then(res => res.text())
    .then(txt => {
      var js = document.createElement("script");
      js.textContent = txt;
      document.head.appendChild(js);
    });
}

  const informationVideo = document.querySelector(".information .video");
  const contactsMap = document.querySelector(".contacts .map");
//   const slider = document.querySelector(".reviews .slider");
  let isScroll = false;
  let showMap = false;
  window.addEventListener("scroll", async() => {
    if (!isScroll) {
        isScroll = true;
      informationVideo.innerHTML = `<div class="blurred-circle"></div>
    <div class="tab-content" id="nav-tabContent">
        <iframe class="tab-pane active" id="video1" role="tabpanel"
            src="https://www.youtube.com/embed/ruKvLm2SR5M" allowfullscreen></iframe>
        <iframe class="tab-pane" id="video2" role="tabpanel"
            src="https://www.youtube.com/embed/CUB43NOvJb4" allowfullscreen></iframe>
    </div> `;

    
await loadScript("/callback/email/forms.js");
await loadScript("https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js");
await loadScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyApaKMAilNYsX9vHCxmTgWCygep1xZ2BUw");
await loadScript("https://cdnjs.cloudflare.com/ajax/libs/granim/1.1.1/granim.min.js");
await loadScript("https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.2/jquery.fancybox.min.js");
await loadScript("/media/js/subscribe_script.js?v1.4");
    
    
    
    
    
    

    }
    if (!showMap && window.scrollY > 200) {
      showMap = true;
      const map = document.createElement("iframe");
      map.src = contactsMap.getAttribute("data");
      map.width = "100%";
      map.height = 557;
      contactsMap.appendChild(map);
    }
  });
  
})();

