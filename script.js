document.getElementById("whatsappIcon").addEventListener("click", function () {
  const predefinedMessage = "Me gustaría saber más sobre sus servicios.";
  const whatsappURL = `https://wa.me/3133574711?text=${encodeURIComponent(
    predefinedMessage
  )}`;
  window.open(whatsappURL, "_blank");
});

document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const phone = document.getElementById("phone").value;
  const message = document.getElementById("message").value;

  fetch(
    "https://script.google.com/macros/s/AKfycbwqo4HuAVUlNYa4MY7chGhwQ4Tlizj-HPuWnPT5gFUOZboac8pDfc9QJWgTuBKkJoE/exec",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(
        email
      )}&phone=${encodeURIComponent(phone)}&message=${encodeURIComponent(
        message
      )}`,
    }
  )
    .then((response) => response.text())
    .then((data) => {
      alert("Mensaje enviado con éxito pronto nos contactaremos contigo");
      document.getElementById("contactForm").reset();
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Hubo un error al enviar el mensaje");
    });
});

var prevScrollpos = window.pageYOffset;
var navbar = document.getElementById("navbar");

window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    navbar.style.top = "0";
  } else {
    navbar.style.top = "-100px";
  }
  prevScrollpos = currentScrollPos;
};
