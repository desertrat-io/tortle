package models.user;

import io.ebean.Finder;
import io.ebean.Model;
import io.ebean.annotation.Length;
import io.ebean.annotation.NotNull;
import io.ebean.annotation.SoftDelete;

import javax.persistence.*;
import java.sql.Timestamp;
import java.util.UUID;

@Entity
public class User extends Model {

    @Id
    Long id;

    @NotNull
    UUID idUuid;

    @NotNull @Column(unique = true)
    String email;

    // using app side encryption, thus not using the @Encrypted Ebean annotation
    @Length(100) @NotNull
    String password;

    boolean needsVerification;

    @NotNull
    Timestamp createdOn;

    Timestamp lastSeen;

    @Length(10000)
    String rememberToken;

    @NotNull
    boolean isLocked;

    @SoftDelete @NotNull
    boolean isDeleted;

    @OneToOne(mappedBy = "user")
    Account account;

    public static final Finder<Long, User> find = new Finder<>(User.class);

    public User setEmail(String email) {
        this.email = email;
        return this;
    }

    public User setPassword(String password) {
        this.password = password;
        return this;
    }

    public User setNeedsVerification(boolean needsVerification) {
        this.needsVerification = needsVerification;
        return this;
    }

    public User setCreatedOn(Timestamp createdOn) {
        this.createdOn = createdOn;
        return this;
    }

    public User setLastSeen(Timestamp lastSeen) {
        this.lastSeen = lastSeen;
        return this;
    }

    public User setRememberToken(String rememberToken) {
        this.rememberToken = rememberToken;
        return this;
    }

    public User setLocked(boolean locked) {
        isLocked = locked;
        return this;
    }
}
