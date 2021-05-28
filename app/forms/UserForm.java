package forms;

import forms.constraints.Unique;
import lib.validators.groups.Login;
import lib.validators.groups.Signup;
import lombok.Getter;
import lombok.Setter;
import models.users.User;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import play.data.validation.Constraints;

@Constraints.Validate
public class UserForm {
    private final Logger logger = LoggerFactory.getLogger(this.getClass());

    @Constraints.Required(message = "email.required", groups = {Signup.class, Login.class})
    @Constraints.Email(message = "email.email", groups = {Signup.class, Login.class})
    @Unique(message = "email.unique", groups = {Signup.class, Login.class},
            modelClass = User.class, uniqueCol = "email")
    @Getter @Setter
    public String email;

    @Constraints.MinLength(message = "password.min_length", value = 8, groups = {Signup.class, Login.class})
    @Constraints.Required(message = "password.required", groups = {Signup.class, Login.class})
    @Getter @Setter
    public String password;


    @Constraints.MinLength(message = "password_confirm.min_length", value = 8, groups = Signup.class)
    @Constraints.Required(message = "password_confirm.required", groups = Signup.class)
    @Getter @Setter
    public String passwordConfirm;

    @Override
    public final String toString() {
        return "Signup{" +
                "email='" + email + '\'' +
                '}';
    }
}
