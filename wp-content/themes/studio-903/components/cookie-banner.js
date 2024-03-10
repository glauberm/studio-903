export default function cookieBanner() {
  const cookieBanner = document.querySelector(".cookie-banner");
  const cookieRadios = document.querySelectorAll(
    ".cookie-banner__choice-radio"
  );
  const cookieConsent = localStorage.getItem("s903_cookie_consent");

  if (!cookieConsent) {
    cookieBanner.hidden = false;
    cookieBanner.classList.remove("cookie-banner--hidden");
    cookieBanner.classList.add("cookie-banner--shown");

    for (const cookieRadio of cookieRadios) {
      cookieRadio.checked = false;
    }
  } else {
    cookieBanner.hidden = true;
    cookieBanner.classList.remove("cookie-banner--shown");
    cookieBanner.classList.add("cookie-banner--hidden");

    if (cookieConsent === "1") {
      insertScript();
    }
  }

  for (const cookieRadio of cookieRadios) {
    cookieRadio.addEventListener("change", function ({ target }) {
      localStorage.setItem("s903_cookie_consent", target.value);

      cookieBanner.hidden = true;
      cookieBanner.classList.remove("cookie-banner--shown");
      cookieBanner.classList.add("cookie-banner--hidden");

      if (target.value === "1") {
        insertScript();
      }
    });
  }
}

function insertScript() {
  const script = document.createElement("script");

  script.type = "text/javascript";
  script.innerHTML = `(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NBKX2XV');`;

  document.head.appendChild(script);
}
