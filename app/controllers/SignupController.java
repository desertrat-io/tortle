package controllers;

import play.mvc.Controller;
import play.mvc.Result;
import util.annotations.NonInterface;

public final class SignupController extends Controller {

    @NonInterface
    public Result index() {
        return ok(views.html.account.signup.render());
    }
}
