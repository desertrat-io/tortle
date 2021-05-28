package controllers;

import lib.annotations.NonInterface;
import play.mvc.Controller;
import play.mvc.Result;

/**
 * This controller contains an action to handle HTTP requests
 * to the application's home page.
 */
public final class HomeController extends Controller {

    /**
     * An action that renders an HTML page with a welcome message.
     * The configuration in the <code>routes</code> file means that
     * this method will be called when the application receives a
     * <code>GET</code> request with a path of <code>/</code>.
     */

    @NonInterface
    public Result index() {
        return ok(views.html.index.render());
    }


}
