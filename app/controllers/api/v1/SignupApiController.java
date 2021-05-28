package controllers.api.v1;

import com.google.common.base.MoreObjects;
import controllers.ApiController;
import forms.UserForm;
import lib.annotations.NonInterface;
import lib.validators.groups.Signup;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import play.data.Form;
import play.data.FormFactory;
import play.filters.csrf.RequireCSRFCheck;
import play.mvc.Http;
import play.mvc.Result;

import javax.inject.Inject;


public class SignupApiController extends ApiController {

    private final Logger logger = LoggerFactory.getLogger(SignupApiController.class);
    @Inject
    private FormFactory formFactory;

    @NonInterface
    @RequireCSRFCheck
    public final Result doSignup(final Http.Request request) {
        final Form<UserForm> signupForm = formFactory.form(UserForm.class, Signup.class).bindFromRequest(request);
        if (signupForm.hasErrors()) {
            return apiError(signupForm.errorsAsJson(), ResponseCode.UNPROCESSABLE_ENTITY, "Invalid submission");
        }
        return ok();
    }

    @Override
    public final String toString() {
        return MoreObjects.toStringHelper(this)
                .toString();
    }
}
