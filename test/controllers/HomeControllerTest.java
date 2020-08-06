package controllers;

import org.junit.Test;
import play.mvc.Http;
import play.mvc.Result;
import tortle.TortleTest;

import static org.junit.Assert.assertEquals;
import static play.mvc.Http.Status.OK;
import static play.test.Helpers.GET;
import static play.test.Helpers.route;

public class HomeControllerTest extends TortleTest {
    @Test
    public final void testIndex() {
        final Http.RequestBuilder request = new Http.RequestBuilder()
                .method(GET)
                .uri("/");

        final Result result = route(app, request);
        assertEquals(OK, result.status());
    }

    @Test
    public void index() {
    }
}
