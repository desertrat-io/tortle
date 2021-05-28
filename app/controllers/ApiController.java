package controllers;

import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.node.ObjectNode;
import com.google.common.base.MoreObjects;
import org.joda.time.DateTime;
import play.libs.Json;
import play.mvc.Controller;
import play.mvc.Result;

public class ApiController extends Controller {

    private static final int SUCCESS_BOUND = 400;

    public enum ResponseCode {
        OK(200),
        FORBIDDEN(403),
        NOT_FOUND(404),
        UNPROCESSABLE_ENTITY(422),
        SERVER_ERROR(500);

        public final int code;

        ResponseCode(final int code) {
            this.code = code;
        }

        @Override
        public String toString() {
            return MoreObjects.toStringHelper(this)
                    .add("code", code)
                    .toString();
        }
    }

    protected static Result apiSuccess(final JsonNode responseBody,
                                       final ResponseCode responseCode,
                                       final String message) {
        if (responseCode.code >= SUCCESS_BOUND) {
            throw new IllegalArgumentException("Invalid response code for response type");
        }
        final ObjectNode response = (ObjectNode) responseBody;
        response.set("payload", responseBody);
        return apiGenericResponse(response, responseCode, message, true);
    }

    protected static Result apiError(final JsonNode errorBody,
                                     final ResponseCode responseCode,
                                     final String message) {
        if (responseCode.code < SUCCESS_BOUND) {
            throw new IllegalArgumentException("Invalid response code for response type");
        }
        final ObjectNode response = Json.newObject();

        response.set("errors", errorBody);
        return apiGenericResponse(response, responseCode, message, false);
    }

    private static Result apiGenericResponse(final JsonNode responseBody,
                                             final ResponseCode responseCode,
                                             final String message,
                                             final boolean successful) {
        final ObjectNode objectNode = Json.newObject();
        objectNode.put("success", successful);
        objectNode.set("data", responseBody);
        objectNode.put("server_message", message);
        objectNode.put("requested_at", (new DateTime()).toString());
        return status(responseCode.code, objectNode);
    }
}
