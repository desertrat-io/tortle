package controllers;

import com.google.common.base.MoreObjects;
import lib.annotations.NonInterface;
import play.filters.csrf.AddCSRFToken;
import play.filters.csrf.CSRF;
import play.i18n.MessagesApi;
import play.mvc.Controller;
import play.mvc.Http;
import play.mvc.Result;

import javax.inject.Inject;

public final class SignupController extends Controller {

    private final MessagesApi messagesApi;

    @Inject
    public SignupController(final MessagesApi messagesApi) {
        this.messagesApi = messagesApi;
    }

    @NonInterface
    @AddCSRFToken
    public Result index(final Http.RequestHeader request) {
        return ok(views.html.account.signup
                .render(CSRF
                        .getToken(request)
                        .map(CSRF.Token::value)
                        .orElse("csrf problem"), this.messagesApi.preferred(request)));
    }

    @Override
    public String toString() {
        return MoreObjects.toStringHelper(this)
                .add("messagesApi", messagesApi)
                .toString();
    }
}
