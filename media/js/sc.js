$(document).ready(function () {

const loadScript = async (url)=>{
    return await fetch(url)
    .then(res => res.text())
    .then(txt => {
      const js = document.createElement("script");
      js.textContent = txt;
      document.head.appendChild(js);
    });
}

  const informationVideo = document.querySelector(".information .video");
  const contactsMap = document.querySelector(".contacts .map");

  let isScroll = false;
  let showMap = false;
  window.addEventListener("mousemove", async() => {
    loadData();
  });
  window.addEventListener("scroll", async() => {
    loadData();
  })


  async function loadData(){
    if (!isScroll) {
        isScroll = true;
      informationVideo.innerHTML = `<div class="blurred-circle"></div>
    <div class="tab-content" id="nav-tabContent">
        <iframe class="tab-pane active" id="video1" role="tabpanel"
            src="https://www.youtube.com/embed/ruKvLm2SR5M" allowfullscreen></iframe>
        <iframe class="tab-pane" id="video2" role="tabpanel"
            src="https://www.youtube.com/embed/CUB43NOvJb4" allowfullscreen></iframe>
    </div> `;



    // await loadLink("https://fonts.gstatic.com", "preconnect");
    // await loadLink("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");

await loadScript("/callback/email/forms.js");
await loadScript("https://cdn.kvin.online/site/?hash=244ea65a3b229661d5c77fecc615ca23");
await loadScript("https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js");
// await loadScript("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js");
await loadScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyApaKMAilNYsX9vHCxmTgWCygep1xZ2BUw");
await loadScript("https://cdnjs.cloudflare.com/ajax/libs/granim/1.1.1/granim.min.js");
// await loadScript("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js");
// await loadScript("/media/js/jquery-libs.js");
await loadScript("https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.2/jquery.fancybox.min.js");
await loadScript("/media/js/subscribe_script.js?v1.4");
await loadScript("/media/js/script.js?v1.3");
await loadScript("/media/js/slick.min.js");
$(".multiple-items").slick({
      arrows: true,
      infinite: true,
      slidesToShow: 3,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            variableWidth: true,
          },
        },
        {
          breakpoint: 576,
          settings: {
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            variableWidth: true,
          },
        },
      ],
    });
    
    function slickify() {
      $(".multiple-items2").slick({
        responsive: [
          {
            breakpoint: 9999,
            settings: "unslick",
          },
          {
            breakpoint: 576,
            settings: {
              infinite: true,
              arrows: false,
              infinite: true,
              slidesToShow: 1,
              variableWidth: true,
            },
          },
        ],
      });
    }
    
    $(window).resize(function () {
      var $windowWidth = $(window).width();
      if ($windowWidth < 576) {
        slickify();
      }
    });
        metrica();
    }
    if (!showMap && window.scrollY > 200) {
      showMap = true;
      const map = document.createElement("iframe");
      map.src = contactsMap.getAttribute("data");
      map.width = "100%";
      map.height = 557;
      contactsMap.appendChild(map);
    }

    
  }

  function metrica(){
    (function(m, e, t, r, i, k, a) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k,
            a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    
    ym(88432761, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });

    const noscript = document.createElement("noscript");
    const iframe = document.createElement("iframe");
    iframe.src="https://www.googletagmanager.com/ns.html?id=GTM-P3RFBHR";
    iframe.height="0";
    iframe.width="0";
    noscript.appendChild(iframe);
    document.body.appendChild(noscript);

    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-P3RFBHR');

    loadScript("https://www.googletagmanager.com/gtag/js?id=UA-226360528-1");
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-226360528-1');
    loadScript(" https://www.googletagmanager.com/gtag/js?id=G-SVMPJQ4PJ6");
    gtag('js', new Date());

    gtag('config', 'G-SVMPJQ4PJ6');

  }

  function modals_init() {
    $('a[href^="#modals-"]').each(function () {
      var $this = $(this);
      if (typeof $this.attr("data-toggle") == "undefined") {
        $this.attr("data-toggle", "modal");
      }
      var id = $this.attr("href");
      var $m = modals_search(id);
      if ($m.length && $this.attr("href") != $m.attr("id")) {
        $this.attr("href", "#" + $m.attr("id"));
      }
    });
    $(".modal").on({
      "shown.bs.modal": function (e) {
        var $t = $(this);
        var id = $t.attr("id") || "";
        var hash = window.location.hash.replace(/\#|\//g, "") || "";
        if (id != "" && hash == "") {
          window.location.hash = id;
        }
        var $in = $t.find("input:not([ka-no],.ka-no)");
        if ($in.length) {
          $in.focus();
        }
      },
      "show.bs.modal": function (e) {
        var $t = $(this);
        var id = $t.attr("id") || "modal-unknown";
        $(".modal").hide();
        $(".modal-backdrop").hide();
      },
      "hide.bs.modal": function (e) {
        window.location.hash = "/";
      },
    });
    var $m = modals_search();
    if ($m.length) {
      if (!$m.hasClass("ka-no") && typeof $m.attr("ka-no") == "undefined") {
        $m.modal("show");
      }
    }
    return true;
  }
  
  function mobile_init() {
    var isMobile =
      /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent
      );
    if (!isMobile) {
      $('a[href^="tel:"]').click(function () {
        var $this = $(this);
        var $m = modals_search("#modals-callback");
        if ($m.length) {
          $m.modal("show");
        }
        return false;
      });
    }
    $(".burg_btn").on("click", function (e) {
      $(".burg").toggleClass("open");
      $("body").toggleClass("scroll-off");
    });
    $(".navbar-collapse a").click(function () {
      $(".navbar-collapse").collapse("hide");
      $(".burg").removeClass("open");
      $("body").removeClass("scroll-off");
    });
    setTimeout(function () {
      $('a[href^="tel:"].calltracking').each(function () {
        var $this = $(this);
        $this.attr("href", "tel:" + $this.text().trim());
      });
    }, 2000);
  }
  function modals_search(id) {
    var $m = $();
    var id = id || window.location.hash || "";
    if (id.substr(0, 1) == "#") {
      id = id.substr(1);
    }
    if (id.indexOf("/")) {
      id = id.split("/")[0];
    }
    try {
      if (id.match(/^modals?-/) != null) {
        var $m = $("#" + id + ".modal");
        if ($m.length == 0) {
          $m = $('.modal[id^="' + id + '-"]');
        }
      }
    } catch (err) {
      console.log(err);
    }
    return $m;
  }
  
  modals_init();
  mobile_init();
});
