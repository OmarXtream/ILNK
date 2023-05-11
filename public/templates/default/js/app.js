const toggleThemeBtn = document.querySelector("#toggle-theme-btn");
const htmlElement = document.querySelector("html");
const mainElement = document.querySelector("main");

toggleThemeBtn.addEventListener("click", () => {
  if (htmlElement.getAttribute("data-theme") === "light") {
    htmlElement.setAttribute("data-theme", "dark");
    mainElement.setAttribute("data-theme", "dark");
  } else {
    htmlElement.setAttribute("data-theme", "light");
    mainElement.setAttribute("data-theme", "light");
  }
});