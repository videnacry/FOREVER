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
    const val = i;
    const req = r;

}