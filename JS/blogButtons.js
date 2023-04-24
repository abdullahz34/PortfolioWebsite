function clearButton() {
    // Ask the user to confirm clearing the form
    if (confirm("Are you sure you want to clear the form?")) {
        // Get the input fields
        const titleInput = document.querySelector('input[name="title"]');
        const messageInput = document.querySelector('textarea[name="description"]');

        // Clear the input fields
        titleInput.value = "";
        messageInput.value = "";

        // Reset the border color of the input fields
        titleInput.style.borderColor = "";
        messageInput.style.borderColor = "";
    }
}

function postButton(event) {
    event.preventDefault();
    const title = document.querySelector('input[name="title"]');
    const message = document.querySelector('textarea[name="description"]');
    if (title.value.trim() === '') {
        title.style.borderColor = 'red';
    } else {
        title.style.borderColor = '';
    }
    if (message.value.trim() === '') {
        message.style.borderColor = 'red';
    } else {
        message.style.borderColor = '';
    }
    if (title.value.trim() === '' || message.value.trim() === '') {
        return;
    } else {
        event.target.form.submit();
    }
}