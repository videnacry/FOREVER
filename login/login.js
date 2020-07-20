const l = console.log;

$(document).ready(() => {
    $("#lg_form").click(e => {
        //Check which form is active
        const target = $(e.target);
        if(target.attr("id") == "login_f_SEND") validateLogin(target.parent().parent());
        else if(target.attr("id") == "register_f_SEND") validateRegister(target.parent().parent());
    })
})

function validateLogin(t) {
    //From args to const
    const target = t;
}

function validateRegister(t) {
    //From args to const
    const target = t;

    //Clean error messages
    $(".alert").remove();

    //SUCCESFULL REGISTER IF ALL VALIDATIONS ARE CORRECT
    //Mega if
    if(iterateValidation([
        {
            el: target.find("input[name='username']"),
            req: {
                min: 3,
                max: 20,
            }
        },
        {
            el: target.find("input[name='email']"),
            req: {
                min: 5,
                max: 40,
                charReq: ["@", "."]
            }
        },
        {
            el: target.find("input[name='password']"),
            req: {
                min: 8,
                max: 30,
            }
        },
        {
            el: target.find("input[name='Cpassword']"),
            req: {
                charReq: target.find("input[name='password']").val()
            }
        }
    ])
    ) {
        //If validation returns true =>
    }
}

function iterateValidation(inputs) {
    let correct = true;
    for(const input of inputs) 
        if(!algValidate(input.el, input.req)) correct = false;

    return correct;
} 

function algValidate(i, r = {
    required: true,
    min: 0,
    max: 999999,
    charReq: []
}) {
    //From args to const
    const target = i;

    const parent = target.parent();
    const key = target.prev().text();
    const val = target.val();
    const req = r;

    let correct = true;
    const errorDiv =  $("<div class='alert alert-danger'></div>");

    //Required check
    if(val.length == 0) {
        parent.append(errorDiv.clone().text(`${key} is required!`));
        correct = false;
    }
        
    //Length check
    if(val.length < req.min) {
        parent.append(errorDiv.clone().text(`${key} has to be at least ${req.min} characters.`));
        correct = false;
    } else if(val.length > req.max) {
        parent.append(errorDiv.clone().text(`${key} cannot be more than ${req.max} characters.`));
        correct = false;
    } 

    //Char check
    //Exact coincidence or character in string?
    if(typeof req.charReq == "string") {
        if(!val.includes(req.charReq)) {
            parent.append(errorDiv.clone().text(`${key} does not coincide.`));
            correct = false;
        }
    } else {
        let characterCorrect = true;
        for(const char of req.charReq) 
            if(!val.includes(char)) characterCorrect = false;

        if(!characterCorrect) {
            parent.append(errorDiv.clone().text(`${key} has to have a ${req.charReq.join(", ")}.`));
            correct = false;
        }
    }

    return correct;
}