var ko_document_inited = false;
["load", "DOMContentLoaded"].forEach(function (event) {
  document.addEventListener(event, function () {
    ko_document_ready();
  });
});

var ko_document_ready = function (force) {
  force = force || false;
  if (ko_document_inited && force == false) {
    return false;
  }
  ko_document_inited = true;

  Array.from(document.forms).forEach(function (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var data = {};
      data["form_comment"] = form.getAttribute("comment") || "";
      Array.from(e.target.elements).forEach(function (el) {
        var name = el.name || "";
        var value = "";
        if (["INPUT", "TEXTAREA"].indexOf(el.tagName) != -1) {
          value = el.value || "";
        } else if (["BUTTON"].indexOf(el.tagName) != -1) {
          value = el.innerHTML || "";
        }
        data[name] = value;
      });
      try {
        ko_ajax.post(
          "/callback/email/callback.php",
          data,
          function (r) {
            const status = JSON.parse(r);
            if (status["status"] === "ok") {
              $("#modal-mail-ok").modal("show");
            } else {
              alert("Ошибка");
            }
            const contactForm = document.querySelector(".contactForm");
            contactForm.reset();
          },
          true
        );
        var modals = document.querySelectorAll(".modal.show");
        modals.forEach(function (modal) {
          modal.modal("hide");
        });
      } catch (er) {
        console.log(er);
        alert("Произошла ошибка");
      }

      // var data = $(this).serializeArray();
      // data.push({name: 'action', value: 'SendForm'});
      // $.ajax({
      //     url: './index.php',
      //     type: 'POST',
      //     data: $.param(data),
      // })
      // .done(function(response){
      //     alert("Заявка успешно отправлена.\nНаш менеджер свяжется с вами в ближайшее время");
      // })
      // .fail(function(response){
      //     alert("Не удалось отправить заявку, проблему решаем.\nПозвоните нам пожалуйста.");
      // });
    });
  });

  function getUrlParams() {
    var vars = {},
      hash;
    var href = window.location.href.replace(/#.+$/g, "");
    var hashes = href.slice(href.indexOf("?") + 1).split("&");
    for (var i = 0; i < hashes.length; i++) {
      hash = hashes[i].split("=");
      vars[hash[0]] = hash[1];
    }
    return vars;
  }
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == " ") c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  var params = getUrlParams();
  if (params["utm_source"] !== undefined) {
    var utm = {};
    for (var i in params) {
      if (!params.hasOwnProperty(i) || params[i] == undefined) {
        continue;
      }
      if (i.match(/^utm_/) !== null) {
        utm[i] = params[i];
      }
    }
    if (Object.keys(utm).length > 0) {
      setCookie("ko.local.init_utm", JSON.stringify(utm));
      // if($.cookie !== undefined){
      //     $.cookie('_ka_init_utm', JSON.stringify(utm));
      // }
    }
  }
};

var ko_classes_f = function () {
  // php.urlencode
  this.urlencode = function (str) {
    str = str + "";
    return encodeURIComponent(str)
      .replace(/!/g, "%21")
      .replace(/'/g, "%27")
      .replace(/\(/g, "%28")
      .replace(/\)/g, "%29")
      .replace(/\*/g, "%2A")
      .replace(/%20/g, "+");
  };
  // php.urldecode
  this.urldecode = function (str) {
    return decodeURIComponent(
      (str + "")
        .replace(/%(?![\da-f]{2})/gi, function () {
          // PHP tolerates poorly formed escape sequences
          return "%25";
        })
        .replace(/\+/g, "%20")
    );
  };
  // php.http_build_query
  this.http_build_query = function (formdata, numericPrefix, argSeparator) {
    var urlencode = this.urlencode;
    var value;
    var key;
    var tmp = [];
    if (typeof formdata != "object") {
      var formdata = {};
    }
    var _httpBuildQueryHelper = function (key, val, argSeparator) {
      var k;
      var tmp = [];
      if (val === true) {
        val = "1";
      } else if (val === false) {
        val = "0";
      }
      if (val !== null) {
        if (typeof val === "object") {
          for (k in val) {
            if (val[k] !== null) {
              tmp.push(
                _httpBuildQueryHelper(key + "[" + k + "]", val[k], argSeparator)
              );
            }
          }
          return tmp.join(argSeparator);
        } else if (typeof val !== "function") {
          return urlencode(key) + "=" + urlencode(val);
        } else {
          //throw new Error('There was an error processing for http_build_query().')
          return "";
        }
      } else {
        return "";
      }
    };
    if (!argSeparator) {
      argSeparator = "&";
    }
    for (key in formdata) {
      value = formdata[key];
      if (numericPrefix && !isNaN(key)) {
        key = String(numericPrefix) + key;
      }
      var query = _httpBuildQueryHelper(key, value, argSeparator);
      if (query !== "") {
        tmp.push(query);
      }
    }
    return tmp.join(argSeparator);
  };
  this.getHash = function (s) {
    var hash = 5381,
      i = s.length;
    while (i) hash = (hash * 33) ^ s.charCodeAt(--i);
    return hash >>> 0;
  };
};
var ko_f = new ko_classes_f();

var ko_classes_ajax = function () {
  this.module = {
    name: "ajax",
    version: "1.0",
  };
  this.options = {};
  this.vars = {
    history: [],
  };
  this.httpRequest = function () {
    // Chrome, Firefox, Opera 8.0+, Safari
    if (window.XMLHttpRequest) {
      return new XMLHttpRequest();
    }
    if (window.XDomainRequest) {
      return new window.XDomainRequest();
    }
    var versions = [
      "MSXML2.XmlHttp.6.0",
      "MSXML2.XmlHttp.5.0",
      "MSXML2.XmlHttp.4.0",
      "MSXML2.XmlHttp.3.0",
      "MSXML2.XmlHttp.2.0",
      "Microsoft.XmlHttp",
    ];
    var xhr;
    for (var i = 0; i < versions.length; i++) {
      try {
        xhr = new ActiveXObject(versions[i]);
        break;
      } catch (e) {}
    }
    return xhr;
  };
  this.history_add = function (s) {
    var r = false;
    if (s === undefined) {
      return r;
    }
    r = this.vars.history.push(ko_f.getHash(s));
    return r;
  };
  this.history_search = function (s) {
    var r = false;
    if (s === undefined) {
      return r;
    }
    s = ko_f.getHash(s);
    var h = this.vars.history;
    for (var i in h) {
      if (!h.hasOwnProperty(i)) {
        continue;
      }
      if (h[i] == s) {
        r = i;
        break;
      }
    }
    return r;
  };
  this.script_add = function (url) {
    var container = document.querySelector("head") || null;
    if (container == null) {
      (function (t, url) {
        setTimeout(function (url) {
          t.script_add(url);
        }, 50);
      })(this, url);
      return true;
    }
    var script = document.createElement("script");
    script.src = url;
    container.appendChild(script);
    return true;
  };
  this.send = function (
    url,
    data,
    callback,
    async,
    cache,
    content_type,
    options
  ) {
    var content_type = content_type || "";
    var r = false;
    var method = data == null ? "GET" : "POST";
    if (typeof async == "undefined") {
      async = true;
    }
    var cache = cache || false;
    if (cache) {
      var o = {};
      if (data instanceof FormData) {
        data.forEach(function (value, key) {
          o[key] = value;
        });
      } else {
        o = data;
      }
      var key = ko_f.is_bool(cache) ? url + "?" + JSON.stringify(o) : cache;
      if (this.history_search(key) !== false) {
        return -1;
      }
      this.history_add(key);
    }
    options = options || {};
    var r = false;
    //ko_f.event(this.module.name, method + ': ' + url + ' | ' + data);
    if (content_type == "jsonp") {
      this.script_add(url);
      r = true;
    } else {
      var xhr = this.httpRequest();
      xhr.open(method, url, async);
      xhr.withCredentials = true;
      if (options["withCredentials"] !== undefined) {
        xhr.withCredentials = options["withCredentials"];
      }
      if (content_type == "json") {
        xhr.setRequestHeader("Content-type", "application/json; charset=utf-8");
        // xhr.withCredentials = false;
      } else {
        //xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        //xhr.withCredentials = true;
      }
      if (method == "POST") {
        var hasFile = false;
        if (data instanceof FormData) {
          hasFile = true;
        }
        if (!hasFile) {
          xhr.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
          );
        }
      }
      if (typeof callback != "undefined") {
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4) {
            callback(xhr.responseText, xhr);
          }
        };
      }
      // console.log(data);
      r = xhr.send(data);
    }
    return r;
  };
  this.jsonp = function (url, data, callback, async, cache, options) {
    var r = false;
    var query = data;
    if (!(data instanceof FormData)) {
      query = ko_f.http_build_query(data || {});
    }
    r = this.send(
      url + (query.length ? "?" + query : ""),
      null,
      callback,
      async,
      cache,
      "jsonp",
      options
    );
    return r;
  };
  this.get = function (
    url,
    data,
    callback,
    async,
    cache,
    content_type,
    options
  ) {
    var r = false;
    var query = data;
    if (!(data instanceof FormData)) {
      query = ko_f.http_build_query(data || {});
    }
    r = this.send(
      url + (query.length ? "?" + query : ""),
      null,
      callback,
      async,
      cache,
      content_type,
      options
    );
    return r;
  };
  this.post = function (
    url,
    data,
    callback,
    async,
    cache,
    content_type,
    options
  ) {
    var r = false;
    var query = data;
    if (typeof data == "string") {
      ////
    } else if (!(data instanceof FormData)) {
      query = ko_f.http_build_query(data || {});
    }
    r = this.send(url, query, callback, async, cache, content_type, options);
    return r;
  };
  this.request = function (url, data, callback, async, cache, method) {
    var r = false;
    var method = method || "POST";
    if (this.options.method == "POST") {
      r = this.post(url, data, callback, async, cache);
    } else {
      r = this.get(url, data, callback, async, cache);
    }
    return r;
  };
};
var ko_ajax = new ko_classes_ajax();
