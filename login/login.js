const l = console.log;

$(document).ready(() => {
    $("#lg_form").click(e => {
        //Check which form is active
        const target = $(e.target);
        if(target.attr("id") == "login_f_SEND") validateLogin(target.parent());
        else if(target.attr("id") == "register_f_SEND") validateRegister(target.parent());
    })
})

function validateLogin(t) {
    //From args to const
    const target = t;
}

function validateRegister(t) {
    //From args to const
    const target = t;
}

function algValidate(i, r = {
    required: true,
    min: 0,
    max: -1,
    charReq: []
}) {
    //From args to const
    const target = i;
    const key = i.before.text();
    const val = i.val();
    const req = r;

    let correct = true;
    const errorDiv = $("<div class='alert alert-danger'></div>");

    //Required check
    if(val.length == 0) {
        target.after(errorDiv.text(`${key} is required!`));
        correct = false;
    }
        
    //Length check
    if(val.length < req.min) {
        target.after(errorDiv.text(`${key} has to be at least ${req.min} characters.`));
        correct = false;
    } else if(val.length > req.max) {
        target.after(errorDiv.text(`${key} cannot be more than ${req.max} characters.`));
        correct = false;
    } 

    //Char check
    //Exact coincidence or character in string?
    if(typeof req.charReq == "string") {
        if(!val.contains(req.charReq)) {
            target.after(errorDiv.text(`${key} does not coincide.`));
            correct = false;
        }
    } else {
        let characterCorrect = true;
        for(const char of req.charReq) 
            if(!val.contains(char)) characterCorrect = false;

        if(!characterCorrect) {
            target.after(errorDiv.text(`${key} has to have a ${req.charReq.join(", ")}.`));
            correct = false;
        }
    }

    return correct;
}