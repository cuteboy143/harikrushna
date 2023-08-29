
$("#add_question").validate({
    errorElement: 'span',
    rules: {
        question: 'required',
    },
    messages: {
        question: "Please enter question",
    }
});


$("#add_role").validate({
    errorElement: 'span',
    rules: {
        name: 'required',
    },
    messages: {
        name: "Please enter name",
    }
});




$("#add_staff").validate({
    errorElement: 'span',
    rules: {
        role: 'required',
        name: 'required',
        email: 'required',
        phone: 'required',
        password: 'required',
    },
    messages: {
        role: "Please select role",
        name: "Please enter name",
        email: "Please enter email id",
        phone: "Please enter phone number",
        password: "Please enter password",
    }
});
