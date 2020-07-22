const l = console.log;

$(document).ready(() => {
    $("#lg_form").click(e => {
        //Check which form is active
        const target = $(e.target);
        if (target.attr("id") == "login_f_SEND") validateLogin(target.parent().parent());
        else if (target.attr("id") == "register_f_SEND") validateRegister(target.parent().parent());
    })
})

function validateLogin(t) {
    //From args to const
    const target = t;

    const usermail = target.find("input[name='usermail']");
    const password = target.find("input[name='password']");

    $(".alert").remove();

    if (validate([{
            el: usermail
        }, {
            el: password
        }])) {
        $.post("login/loginUser.php", {
            usermail: usermail.val(),
            password: password.val()
        }, data => {
            const error = $(`<div class='alert alert-danger'>${data}</div>`);

            if (data == "SUCCESS") location.replace("personal-wall/profile.php")
            else {
                if (data.includes("email")) usermail.after(error);
                else password.after(error);
            }
        })
    }
}

function validateRegister(t) {
    //From args to const
    const target = t;

    const user = target.find("input[name='username']");
    const email = target.find("input[name='email']");
    const password = target.find("input[name='password']");
    const confirmPassword = target.find("input[name='Cpassword']");

    //Clean error messages
    $(".alert").remove();

    //SUCCESFULL REGISTER IF ALL VALIDATIONS ARE CORRECT
    //Mega if
    if (validate([{
                el: user,
                req: {
                    required: true,
                    min: 3,
                    max: 20,
                    charReq: []
                }
            },
            {
                el: email,
                req: {
                    required: true,
                    min: 5,
                    max: 40,
                    charReq: ["@", "."]
                }
            },
            {
                el: password,
                req: {
                    required: true,
                    min: 8,
                    max: 30,
                    charReq: []
                }
            },
            {
                el: confirmPassword,
                req: {
                    required: true,
                    min: 8,
                    max: 30,
                    charReq: password.val()
                }
            }
        ])) {
        //If validation returns true =>
        $.post("login/registerUser.php", {
            username: user.val(),
            email: email.val(),
            password: password.val()
        }, () => location.replace("personal-wall/profile.php"));
    }
}

function formatCharArray(array) {
    let string = "";
    let c = 1;

    for (const elem of array) {
        if (c < array.length) string += `"${elem}", `;
        else string += `and "${elem}"`;
        c++;
    }

    return string;
}

function validate(inputs) {
    let correct = true;
    for (const input of inputs) {
        if (input.req === undefined) {
            if (!algValidate(input.el)) correct = false;
        } else {
            if (!algValidate(input.el, input.req)) correct = false;
        }
    }

    return correct;
}

function algValidate(i, r = {
    required: true,
    min: 0,
    max: 9999,
    charReq: []
}) {
    //From args to const
    const target = i;

    const parent = target.parent();
    const key = target.prev().text();
    const val = target.val();
    const req = r;

    let correct = true;
    const errorDiv = $("<div class='alert alert-danger'></div>");

    //Required check
    if (val.length == 0) {
        parent.append(errorDiv.clone().text(`${key} is required!`));
        correct = false;
    }

    //Length check
    if (val.length < req.min) {
        parent.append(errorDiv.clone().text(`${key} has to be at least ${req.min} characters.`));
        correct = false;
    } else if (val.length > req.max) {
        parent.append(errorDiv.clone().text(`${key} cannot be more than ${req.max} characters.`));
        correct = false;
    }

    //Char check
    //Exact coincidence or character in string?
    if (typeof req.charReq == "string") {
        if (!val.includes(req.charReq)) {
            parent.append(errorDiv.clone().text(`${key} does not coincide.`));
            correct = false;
        }
    } else {
        let characterCorrect = true;
        for (const char of req.charReq)
            if (!val.includes(char)) characterCorrect = false;

        if (!characterCorrect) {
            parent.append(errorDiv.clone().text(`${key} has to have a ${formatCharArray(req.charReq)}.`));
            correct = false;
        }
    }

    return correct;
}