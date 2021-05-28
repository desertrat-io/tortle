package security;

import io.ebean.Model;

import java.time.Instant;

public interface Authenticatable {

    public String getEntityPrimaryKeyField();

    public String getSecretKey();

    public String getIdKey();

    public Class<? extends Model> getModelClass();

    public boolean isValid();

    public Instant expires();


}
