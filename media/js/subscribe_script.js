$(document).ready(function () {
  stepBack();
});

function stepBack() {
  $("#step-2 .go-back span").click(function () {
    $("#step-2").hide();
    $("#step-1").show();
    $('[name="code"]').val("");
    $('[name="email"]').val("");
  });
}

function subscribeStop_init() {
  let r = false;
  var url = "https://arm.sahihinvest.ru/api/users/send-code/{email}";
  var data = {
    email: "",
  };

  var $error = document.getElementById("error-step1");
  var $form = document.querySelector("#form-step1");

  var $email = $form.querySelector('[name="email"]');
  if ($email !== null) {
    data["email"] = $email.value || "";
  }

  for (var i in data) {
    if (data.hasOwnProperty(i) == false) {
      continue;
    }
    url = url.replace("{" + i + "}", encodeURIComponent(data[i]));
  }

  try {
    fetch(url, { credentials: "same-origin" })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        if (data["message"] != null && typeof data["message"] !== undefined) {
          document.querySelector("#error-step1").style.display = "block";
          document.querySelector("#error-step1").innerHTML = data["message"];
        } else {
          document.querySelector("#error-step1").style.display = "none";
          document.querySelector("#step-1").style.display = "none";
          document.querySelector("#step-2").style.display = "block";
        }
      });
    r = true;
  } catch (er) {
    console.error(er);
  }
  return r;
}

async function subscribeCode_init() {
  let r = false;
  var url =
    "https://arm.sahihinvest.ru/api/tinkoff/turn-off-auto-renewal?email={email}&code={code}";

  var data = {
    email: "",
    cody: "",
  };

  const formData = new FormData();

  var $error = document.getElementById("error-step2");

  var email = document.querySelector('[name="email"]');
  if (email !== null) {
    data["email"] = email.value || "";
  }

  var code = document.querySelector('[name="code"]');
  if (code !== null) {
    data["code"] = code.value || "";
  }

  for (var i in data) {
    if (data.hasOwnProperty(i) == false) {
      continue;
    }
    url = url.replace("{" + i + "}", encodeURIComponent(data[i]));
  }

  var $email = email.value;
  var $code = code.value;
  formData.append("email", $email);
  formData.append("code", $code);

  if ($email === "" || $code === "") {
    return r;
  }

  try {
    const response = await fetch(url, {
      method: "POST",
      mode: "cors",
      credentials: "same-origin",
      body: formData,
    });
    if (response.ok) {
      $("#modal-subscribe-stopped").modal("show");
    } else {
      console.log("error");
      const data = await response.json();
      if (data["message"] != null && typeof data["message"] !== undefined) {
        document.querySelector("#error-step2").style.display = "block";
        document.querySelector("#error-step2").innerHTML = data["message"];
      } else {
        document.querySelector("#step-2").style.display = "none";
        document.querySelector("#confirmed").style.display = "block";
      }
    }
    r = true;
  } catch (er) {
    console.error(er);
  }
  return r;
}
