(() => {
  const informationVideo = document.querySelector(".information .video");
  const contactsMap = document.querySelector(".contacts .map");
  const slider = document.querySelector(".reviews .slider");
  let isScroll = false;
  let showMap = false;
  window.addEventListener("scroll", () => {
    if (!isScroll) {
      showVideo = true;
      informationVideo.innerHTML = `<div class="blurred-circle"></div>
    <div class="tab-content" id="nav-tabContent">
        <iframe class="tab-pane active" id="video1" role="tabpanel"
            src="https://www.youtube.com/embed/ruKvLm2SR5M" allowfullscreen></iframe>
        <iframe class="tab-pane" id="video2" role="tabpanel"
            src="https://www.youtube.com/embed/CUB43NOvJb4" allowfullscreen></iframe>
    </div> `;
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
