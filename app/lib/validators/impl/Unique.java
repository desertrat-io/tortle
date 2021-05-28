package lib.validators.impl;

import com.google.common.base.MoreObjects;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import play.data.validation.Constraints;

import javax.validation.ConstraintValidatorContext;
import java.lang.reflect.InvocationTargetException;

public class Unique implements Constraints.PlayConstraintValidator<forms.constraints.Unique, String> {

    private final Logger logger = LoggerFactory.getLogger(this.getClass());
    private String uniqueColumn;


    @Override
    public final void initialize(final forms.constraints.Unique constraintAnnotation) {
    /*    try {
            uniqueModel = constraintAnnotation.modelClass().getDeclaredConstructor().newInstance();
            uniqueColumn = constraintAnnotation.uniqueCol();
        } catch (final InstantiationException | IllegalAccessException
                | InvocationTargetException | NoSuchMethodException e) {
            logger.error(e.getMessage());
        }*/
    }

    @Override
    public final boolean isValid(final String value, final ConstraintValidatorContext context) {
/*
        final boolean result = db.find(uniqueModel.getClass()).where().eq(uniqueColumn, value).exists();
        return this.reportValidationStatus(result ? "Value already exists" : null, context);*/
        return true;
    }

    @Override
    public final String toString() {
        /*return MoreObjects.toStringHelper(this)
                .add("uniqueModel", uniqueModel)
                .add("uniqueColumn", uniqueColumn)
                .toString();*/
        return "";
    }
}
