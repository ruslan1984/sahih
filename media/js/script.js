var catalog = {
  isMobile: false,
  template: {
    items: null,
    container: null,
    row: null,
    col: null,
  },
};

$(document).ready(function () {
  check_url();
  terms_init();
  tel_init();
  scrollto_init();
  modals_init();
  mobile_init();
  navigation_scroll();
  animation_init();
  carousel_init();
  popover_init();
  tooltip_init();
  links_init();
  forms_init();
  ka_filter_init();
  catalog_init();
  bg_init();
  fancybox_init();
  tariffs_init();
});

function referrer_get(url) {
  let r = "";
  url = url || window.location;
  r = new URL(url).searchParams.get("referrer") || "";
  return r;
}

function tariffs_init() {
  let r = false;
  var url = "https://arm.sahihinvest.ru/api/tinkoff/tariffs?";
  var ref = referrer_get();
  if (ref != "") {
    url += "referrer=" + encodeURIComponent(ref) + "&";
  }
  try {
    const loc = window.location.href.split("/")[3];
    const ln = loc === "en" || loc === "kz" ? "EN" : "KZ";
    fetch(url, {
      credentials: "same-origin",
      headers: { "Accept-Language": ln },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data["tariffs"] !== undefined) {
          tariffs_apply(data["tariffs"] || []);
        }
      });
    r = true;
  } catch (er) {
    console.error(er);
  }
  return r;
}

function tariffs_apply(items) {
  var r = false;
  if (items.length == 0) {
    return r;
  }
  if (
    document.body == null ||
    document.querySelector('select[name="donate_amount"]')?.length == 0
  ) {
    setTimeout(function () {
      tariffs_apply(items);
    }, 100);
    return r;
  }
  try {
    var options = [];
    items.forEach(function (item) {
      var option = document.createElement("option");
      option.innerHTML = item["label"] + " — " + item["price"] + " ₽";
      option.value = item["price"];
      options.push(option);
    });
    if (options.length > 0) {
      options[options.length - 1].selected = true;
    }
    var selects = document.querySelectorAll('select[name="donate_amount"]');
    selects.forEach(function (select) {
      select.innerHTML = "";
      options.forEach(function (option) {
        select.appendChild(option);
      });
    });
  } catch (er) {
    console.error(er);
  }

  return r;
}

function check_url() {
  var params = new URLSearchParams(location.search);
  var message = params.get("message") || "";
  var status = params.get("status") || "";
  if (message != "") {
    if (status == "success") {
      $("#modal-result .modal-header h3").text("Успешно");
      $("#modal-result .modal-header .sub-title").text(message);
    } else {
      $("#modal-result .modal-header h3").text("Ошибка");
      $("#modal-result .modal-header .sub-title").text(message);
    }
    $("#modal-result").modal("show");
  }
}

function go_donation() {
  var r = false;
  var $form = document.querySelector("#form-donation");
  r = pay_url($form, true, "self");
  return r;
}

function go_subscribe() {
  var r = false;
  var $form = document.querySelector("#form-subscribe");
  r = pay_url($form, false, "self");
  return r;
}

function pay_url($form, is_donation, target) {
  var r = false;
  var is_donation = is_donation || false;
  var target = target || "";

  var url =
    "https://arm.sahihinvest.ru/api/tinkoff/generate-payment-link?login={email}&autoRenewal={autoRenewal}&amount={amount}&isDonation={is_donation}&callback_url={callback_url}&referrer={referrer}";

  var data = {
    email: "",
    autoRenewal: "false",
    amount: 0,
    is_donation: is_donation ? "true" : "false",
    callback_url: window.location.href.replace(/#.+$/, ""),
    referrer: referrer_get(),
  };
  var $email = $form.querySelector('[name="email"]');
  if ($email !== null) {
    data["email"] = $email.value || "";
  }

  var $auto_renew = $form.querySelector('[name="auto_renew"]');
  if ($auto_renew !== null) {
    data["autoRenewal"] =
      !is_donation && $auto_renew.checked ? "true" : "false";
  }

  var $amount = $form.querySelector('[name="donate_amount"]');
  if ($amount !== null) {
    data["amount"] = parseInt($amount.value || "0");
  }

  if (data["email"] == "" || data["amount"] <= 0) {
    return r;
  }
  for (var i in data) {
    if (data.hasOwnProperty(i) == false) {
      continue;
    }
    url = url.replace("{" + i + "}", encodeURIComponent(data[i]));
  }
  if (target == "self") {
    r = true;
    window.location.href = url;
  } else if (target == "blank") {
    r = true;
    window.open(url, "_blank");
  } else {
    r = url;
  }
  return r;
}

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

/*
$(window).resize(function(){
	var $this = $(this);
	catalog.isMobile = ($this.width() < 768);
});
*/

function ka_filter_init() {
  $("[ka-filter]").each(function (e) {
    var $container = $(this);
    if ($container.find("[ka-filter-item]").length > 1) {
      var mode = $container.attr("ka-filter-mode") || "";
      $container
        .find("[ka-filter-rule]")
        .each(function (e) {
          var $this = $(this);
          $this.attr("href", "");
        })
        .click(function (e) {
          e.stopPropagation();
          var $this = $(this);
          var rule = $this.attr("ka-filter-rule") || "";
          if (typeof rule == "undefined" || rule == "") {
            rule = $this.text() || "";
          }
          if ($this.hasClass("active")) {
            rule = "";
          }
          $container.find("[ka-filter-rule]").removeClass("active");
          if (rule != "") {
            $this.addClass("active");
          }
          ka_filter_exec($container, rule, mode);
          return false;
        });
    }
  });
  return true;
}

function ka_filter_exec($container, rule, mode) {
  var count = 0;
  var mode = mode || "in";
  rule = rule.replace(/&nbsp;/g, " ");
  $container.find("[ka-filter-item]").each(function (e) {
    var $this = $(this);
    var value = $this.attr("ka-filter-item") || "";
    value = value.replace(/&nbsp;/g, " ");
    var turn = false;
    if (rule == "") {
      turn = true;
    } else if (mode == "in") {
      var v = value
        .toLowerCase()
        .split(/[\n|\r\|]+/)
        .map(function (v) {
          return v.trim();
        });
      var r = rule
        .toLowerCase()
        .split(/[\|]+/)
        .map(function (v) {
          return v.trim();
        });
      for (var i in v) {
        if (v[i] == "") {
          continue;
        }
        if (r.indexOf(v[i]) != -1) {
          turn = true;
          break;
        }
      }
    } else if (mode == "search") {
      var v = value.toLowerCase();
      var r = rule.toLowerCase();
      if (v.indexOf(r) != -1) {
        turn = true;
      }
    } else if (mode == "regexp") {
      var reg = new RegExp(rule, "gi");
      if (reg.test(value)) {
        turn = true;
      }
    }
    if (turn) {
      $this.fadeIn("fast");
      count += 1;
    } else {
      $this.fadeOut("fast");
      count -= 1;
    }
  });
  return count;
}

function catalog_init(loop) {
  if (typeof loop == "undefined") {
    var loop = 5000;
  }
  if (loop <= 0) {
    return false;
  }
  window.ko = window.ko || {};
  window.ka = window.ka || {};
  var isKo =
    typeof window.ko.classes != "undefined" &&
    typeof window.ko.classes.gsheet_data != "undefined";
  var isKa =
    typeof window.ka.classes != "undefined" &&
    typeof window.ka.classes.gsheet_data != "undefined";
  if (!isKo && !isKa) {
    setTimeout(function () {
      catalog_init(loop - 100);
    }, 500);
    return false;
  }
  catalog_exec();
  return true;
}

function catalog_exec() {
  var options = {
    url: "https://docs.google.com/spreadsheets/d/1p575NeAU0pPTCZTzzKXTXHqzvbMQ77dmRYWComl-cDc/edit#gid=0",
    container: "#projects [ka-catalog-items]",
    hooks: {
      data_prepare: function (items) {
        return items;
      },
      template_item: function (item, k, prev) {
        var s = "";

        var is = false;
        var t = {};
        for (var i in item) {
          if (!item.hasOwnProperty(i) || typeof item[i] == "undefined") {
            continue;
          }
          t["item." + i] = item[i];
          is = true;
        }
        if (!is) {
          return null;
        }

        var status = 1;
        if (t["item.status"].length >= 1 && t["item.status"] == 0) {
          status = 0;
        }
        if (status == 0) {
          return null;
        }

        if (t["item.фон"] != "" && catalog.isMobile) {
          t["item.классы"] = "";
        }
        var ss = t["item.услуги"].split(/\n+/g).map(function (v) {
          return v.trim();
        });
        t["item.фильтр"] = ss.join("|") + "|" + t["item.категория"];

        t["item.кейсзаголовок"] = t["item.кейсзаголовок"] || "";
        t["item.кейсссылка"] = t["item.кейсссылка"] || "";
        t["item.case-style"] = "display:none;";
        if (t["item.кейсзаголовок"] != "") {
          t["item.case-style"] = "";
          t["item.фильтр"] += "|кейсы";
        }

        var a = '<div class="services-item">';
        var b = "</div>";
        if (ss.length > 0) {
          t["item.услуги"] = a + ss.join(b + "" + a) + b;
        } else {
          t["item.услуги"] = "";
        }
        if (typeof text_normalize != "undefined") {
          t["item.кейсзаголовок"] = text_normalize(t["item.кейсзаголовок"]);
          t["item.описание"] = text_normalize(t["item.описание"]);
          t["item.подпись"] = text_normalize(t["item.подпись"]);
          t["item.проект"] = text_normalize(t["item.проект"]);
        }

        if (catalog.template.col.length == 0) {
          return "";
        }
        var html = catalog.template.col.get(0).outerHTML || "";
        for (var i in t) {
          var reg = new RegExp("{{" + i + "}}", "gi");
          html = html.replace(reg, t[i]);
        }
        html = html.replace("{{.+?}}", "");
        s = html;

        if (t["item.фон"] != "" && !catalog.isMobile) {
          s = s.replace("card-body", "card-img-overlay");
        }

        return s;
      },
      template_container: function (items) {
        var r = '<div class="row">' + items.join("") + "</div>";
        return r;
      },
      start: function () {
        var $window = $(window);

        catalog.isMobile =
          /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
            navigator.userAgent
          ) || $window.width() < 768;

        var $section = $("[ka-catalog-items]").parents("section");
        catalog.template.items = $section.find("[ka-catalog-items]");
        catalog.template.container = $section.find('[ka-template="container"]');
        catalog.template.row = $section.find('[ka-template="row"]');
        catalog.template.col = $section.find('[ka-template="col"]');

        catalog.template.container.hide();
        catalog.template.items.html("Загрузка каталога товаров…");
        //$('.catalog-filter').html('Загрузка категорий товаров…');
      },
      end: function (r) {
        ka_filter_init();
      },
    },
  };
  if (typeof ko.classes != "undefined") {
    gsheet_catalog = new ko.classes.gsheet_data(options);
    catalog.items = gsheet_catalog.items();
  } else if (typeof ka.classes != "undefined") {
    gsheet_catalog = new ka.classes.gsheet_data(options);
    catalog.items = gsheet_catalog.items();
  }
  return true;
}

function terms_init() {
  $('.note-terms [type="checkbox"]').on("change", function (e) {
    var $this = $(this);
    var checked = $this.prop("checked");
    var $submit = $this.parents("form").find('[type="submit"]');
    if (checked) {
      $submit.prop("disabled", false);
      return true;
    }
    if (
      !confirm(
        "Без согласия на обработку данных мы не можем принять заявку. Продолжить?"
      )
    ) {
      $this.prop("checked", true);
    } else {
      $submit.prop("disabled", true);
    }
  });
}

function forms_init() {
  return false;
}

function popover_init() {
  $('[data-toggle="popover"]').each(function () {
    var $this = $(this);
    var options = {
      html: true,
      placement: "top",
      trigger: "hover",
      container: "body",
    };
    var src = $this.attr("data-img");
    if (typeof src != "undefined") {
      var img = new Image();
      img.src = src;
      img.height = "150";
      img.alt = "";
      options["content"] = img.outerHTML;
    }
    $this.popover(options);
  });
  $("abbr")
    .each(function () {
      var $this = $(this);
      $this.data("content", $this.attr("title"));
      $this.attr("title", "");
    })
    .popover({
      html: true,
      placement: "top",
      trigger: "hover",
      container: "body",
    });
}

function tooltip_init() {
  $('[data-toogle="tooltip"]').tooltip({
    html: true,
    placement: "top",
    trigger: "hover",
  });
}

function links_init() {
  $('a[href^="http://"], a[href^="https://"], a[href^="//"]').each(function () {
    var $this = $(this);
    var target = $this.attr("target") || null;
    if (target == null) {
      $this.attr("target", "_blank");
    }
  });
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

function scrollto_init() {
  $(
    'a[href^="#"]:not([data-toggle], [data-slide], a[href^="#modal-"], a[href^="#modals-"])'
  ).click(function () {
    var offset = $("header").height();
    var isMobile =
      /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent
      );
    if (isMobile) {
      offset = $("header").height();
    }
    var speed = 300;
    var href = $(this).attr("href");
    if (href == "#") {
      href = $("header + section");
      speed = 300;
    }
    $.scrollTo(href, speed, { offset: -1 * offset });
    return false;
  });
}

function placeholder_init() {
  $("input, textarea").placeholder();
}

function tel_init() {
  if (!$.fn.mask) {
    return false;
  }
  $inputs = $('input[type="tel"], input.tel');

  var options = {
    translation: {
      "+": { pattern: /\+/, optional: true },
      7: { pattern: /[123456789]/ },
      8: { pattern: /[8]/ },
      9: { pattern: /[0-9]/ },
      0: { pattern: /[#;,:0-9]/, optional: true },
    },
  };
  $inputs.mask("+7 999 999-99-99 00000000", options);

  return true;
}

function animation_init() {
  $("[anim]").each(function () {
    var $this = $(this);
    var $items = $this.find("[anim-item]");
    var time = $this.attr("anim-item-time") || 200;
    var delay = $this.attr("anim-item-delay") || 0;
    var duration = $this.attr("anim-item-duration") || time * 2 + "ms";
    $items.each(function () {
      var $item = $(this);
      var anim = $item.attr("anim-item") || "";
      if (anim != "") {
        if (!$item.hasClass("visible")) {
          $item.addClass("invisible");
        }
        $item.viewportChecker({
          classToAdd: "visible animated " + anim + "In",
          classToRemove: "invisible",
          offset: 50,
        });
        $item.css({
          "animation-delay": delay + "ms",
          "animation-duration": duration,
        });
        delay += time;
      }
    });
    var anim = $this.attr("anim") || ""; // fade
    if (anim != "") {
      if (!$this.hasClass("visible")) {
        $this.addClass("invisible");
      }
      $this.viewportChecker({
        classToAdd: "visible animated " + anim + "In",
        classToRemove: "invisible",
        offset: 50,
      });
    }
  });

  return true;
}

function carousel_init() {
  $("#multiCarousel").carousel({
    interval: 10000,
  });
  $(".carousel .carousel-item").each(function () {
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(":first");
    }
    next.children(":first-child").clone().appendTo($(this));

    for (var i = 0; i < 2; i++) {
      next = next.next();
      if (!next.length) {
        next = $(this).siblings(":first");
      }

      next.children(":first-child").clone().appendTo($(this));
    }
  });
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

function navigation_scroll() {
  var offset = $("header + section").height() || $(window).height() || 500;
  var scroll = $(document).scrollTop();
  if (scroll < 90) {
    $(".nav-fix")
      .toggleClass("fill-fixed", false)
      .toggleClass("fill-anim", false);
    $(".nav-fix nav").toggleClass("fill-fixed_nav", false);
    $(".nav-fix .navbar-nav").removeClass("mt-2", false);
  } else if (scroll >= offset) {
    $(".nav-fix")
      .toggleClass("fill-fixed", true)
      .toggleClass("fill-anim", false);
    $(".nav-fix nav").toggleClass("fill-fixed_nav", true);
    $(".nav-fix .navbar-nav").removeClass("mt-2", true);
  } else if (scroll < offset - 80) {
    $(".nav-fix")
      .toggleClass("fill-fixed", false)
      .toggleClass("fill-anim", true);
    $(".nav-fix nav").toggleClass("fill-fixed_nav", false);
    $(".nav-fix .navbar-nav").removeClass("mt-2", false);
  }
}
$(document).scroll(function () {
  navigation_scroll();
});

function bg_init() {
  var el = document.querySelector("#canvas-basic");
  if (el === null) {
    return false;
  }
  var granimInstance = new Granim({
    element: "#canvas-basic",
    name: "basic-gradient",
    direction: "left-right", // 'diagonal', 'top-bottom', 'radial'
    opacity: [1, 1],
    isPausedWhenNotInView: true,
    states: {
      "default-state": {
        gradients: [
          ["#360033", "#0b8793"],
          ["#cc2b5e", "#753a88"],
        ],
      },
    },
  });
}

function fancybox_init() {
  $('div[data="fancy-fp"]').on("click", function () {
    $.fancybox.open(
      [
        {
          src: "/media/img/",
        },
        {
          src: "/media/img/",
        },
        {
          src: "/media/img/",
        },
        {
          src: "/media/img/",
        },
        {
          src: "/media/img/",
        },
        {
          src: "/media/img/",
        },
      ],
      {
        loop: true,
        thumbs: {
          autoStart: true,
        },
        caption: "Фабрика предпринимательства",
      }
    );
  });
  return true;
}
