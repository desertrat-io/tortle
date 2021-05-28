package forms.constraints;
import javax.validation.Constraint;
import javax.validation.Payload;
import java.lang.annotation.*;

import static java.lang.annotation.ElementType.TYPE;

@Target({TYPE, ElementType.ANNOTATION_TYPE, ElementType.FIELD})
@Retention(RetentionPolicy.RUNTIME)
@Repeatable(Unique.List.class)
@Constraint(validatedBy = lib.validators.impl.Unique.class)
public @interface Unique {

    String message() default "error.unique";

    String uniqueCol();

    Class<?> modelClass();

    Class<?>[] groups() default {};

    Class<? extends Payload>[] payload() default {};

    @Target({TYPE, ElementType.ANNOTATION_TYPE, ElementType.FIELD})
    @Retention(RetentionPolicy.RUNTIME)
    @interface List {
        Unique[] value();
    }
}
