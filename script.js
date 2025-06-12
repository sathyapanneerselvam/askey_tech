document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("employeeForm").addEventListener("submit", function (e) {
    let empno = document.getElementById("empno").value.trim();
    let empname = document.getElementById("empname").value.trim();
    let age = document.getElementById("age").value.trim();
    let salary = document.getElementById("salary").value.trim();

    let errorMessages = [];

    if (empno === "") {
      errorMessages.push("❗ Kindly add the employee number.");
    } else if (isNaN(empno)) {
      errorMessages.push("❌ Employee number must be numeric.");
    }

    if (empname === "") {
      errorMessages.push("❗ Kindly add the employee name.");
    } else if (empname.length < 2) {
      errorMessages.push("❌ Name must have at least 2 characters.");
    }

    if (age === "") {
      errorMessages.push("❗ Kindly add the age.");
    } else if (isNaN(age) || age <= 0) {
      errorMessages.push("❌ Age must be a valid positive number.");
    }

    if (salary === "") {
      errorMessages.push("❗ Kindly add the salary.");
    } else if (isNaN(salary) || salary <= 0) {
      errorMessages.push("❌ Salary must be a valid positive number.");
    }

    if (errorMessages.length > 0) {
      alert(errorMessages.join("\n"));
      e.preventDefault(); 
    }
  });
});
