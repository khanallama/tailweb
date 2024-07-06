document.addEventListener('DOMContentLoaded', function () {
    const addModal = document.getElementById('addStudentModal');
    const editModal = document.getElementById('editStudentModal');

    window.onclick = function (event) {
        if (event.target === addModal) {
            addModal.style.display = "none";
        } else if (event.target === editModal) {
            editModal.style.display = "none";
        }
    };


});

function passwordShowHide() {
    const password = document.getElementById("password");
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}

/**
 *
 * @param id
 */
function toggleDropdown(id) {
    const dropdown = document.getElementById("dropdown-" + id);
    dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
}

/**
 *
 * @param id
 * @param name
 * @param subject
 * @param marks
 */
function showEditModal(id, name, subject, marks) {
    const editModal = document.getElementById('editStudentModal');
    const editName = document.getElementById('editName');
    const editSubject = document.getElementById('editSubject');
    const editMarks = document.getElementById('editMarks');
    const editStudentId = document.getElementById('editStudentId');

    editName.value = name;
    editSubject.value = subject;
    editMarks.value = marks;
    editStudentId.value = id;

    editModal.style.display = 'block';
}

/**
 *
 * @param id
 */
function deleteStudent(id) {
    if (confirm("Are you sure?")) {
        const form = document.createElement("form");
        form.method = "post";
        form.action = "../Controller/delete_student.php";
        form.innerHTML = `<input type="hidden" name="id" value="${id}">`;
        document.body.append(form);
        form.submit();
    }
}
