
let workTittle = document.getElementById('work');
let breakTittle = document.getElementById('break');

let workTime = 25;
let breakTime = 5;

let seconds = "00"

window.onload = function(){
  document.getElementById('minutes').innerHTML = workTime;
  document.getElementById('seconds').innerHTML = seconds;

  workTittle.classList.add('active');
}

function startbreak() {
  workTittle.classList.remove('active');
  breakTittle.classList.add('active');
}

function start() {
  document.getElementById('start').style.display = "none";
  document.getElementById('reset').style.display = "block";

  seconds = 59;

  let workMinutes = workTime - 1;
  let breakMinutes = breakTime - 1;

  breakCount = 0;

  let timerFunction = function () {
    document.getElementById('minutes').innerHTML = workMinutes;
    document.getElementById('seconds').innerHTML = seconds;

    seconds = seconds - 1;

    if (seconds === 0) {
      workMinutes = workMinutes - 1;
      if (workMinutes === -1) {
        if (breakCount % 2 === 0) {

          workMinutes = breakMinutes;
          breakCount++

          workTittle.classList.remove('active');
          breakTittle.classList.add('active');
        } else {

          workMinutes = workTime;
          breakCount++

          breakTittle.classList.remove('active');
          workTittle.classList.add('active');
        }
      }
      seconds = 59;
    }
  }
  setInterval(timerFunction, 1000);
}

const inputField = document.querySelector(".input-field textarea"),
  todoLists = document.querySelector(".todoLists"),
  pendingNum = document.querySelector(".pending-num"),
  clearButton = document.querySelector(".clear-button");

function allTasks() {
  let tasks = document.querySelectorAll(".pending");

  //if tasks' length is 0 then pending num text content will be no, if not then pending num value will be task's length
  pendingNum.textContent = tasks.length === 0 ? "no" : tasks.length;

  let allLists = document.querySelectorAll(".list");
  if (allLists.length > 0) {
    todoLists.style.marginTop = "20px";
    clearButton.style.pointerEvents = "auto";
    return;
  }
  todoLists.style.marginTop = "0px";
  clearButton.style.pointerEvents = "none";
}

//add task while we put value in text area and press enter
inputField.addEventListener("keyup", (e) => {
  let inputVal = inputField.value.trim(); //trim fuction removes space of front and back of the inputed value

  //if enter button is clicked and inputed value length is greated than 0.
  if (e.key === "Enter" && inputVal.length > 0) {
    let liTag = ` <li class="list pending" onclick="handleStatus(this)">
          <input type="checkbox" />
          <span class="task">${inputVal}</span>
          <i class="uil uil-trash" onclick="deleteTask(this)"></i>
        </li>`;

    todoLists.insertAdjacentHTML("beforeend", liTag); //inserting li tag inside the todolist div
    inputField.value = ""; //removing value from input field
    allTasks();
  }
});

//checking and unchecking the chekbox while we click on the task
function handleStatus(e) {
  const checkbox = e.querySelector("input"); //getting checkbox
  checkbox.checked = checkbox.checked ? false : true;
  e.classList.toggle("pending");
  allTasks();
}

//deleting task while we click on the delete icon.
function deleteTask(e) {
  e.parentElement.remove();
  allTasks();
}

//deleting all the tasks while we click on the clear button.
clearButton.addEventListener("click", () => {
  todoLists.innerHTML = "";
  allTasks();
});

