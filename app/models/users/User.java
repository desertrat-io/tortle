package models.users;

import lombok.Setter;

import javax.persistence.*;
import java.sql.Timestamp;
import java.util.UUID;

// TODO: try to refactor the table that way this lines up
@Entity @Setter
public class User {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    long id;

    UUID idUuid = UUID.randomUUID();

    @OneToOne
    Registration registration;

    @Column(unique = true)
    String email;

    String password;

    boolean needsVerification = true;

    Timestamp createdOn;

    Timestamp lastSeen;

    String rememberToken;

    boolean isLocked = false;

    boolean isDeleted = false;

    @OneToOne(mappedBy = "user")
    Account account;

    @Override
    public final String toString() {
        return "User{" +
                "id=" + id +
                ", idUuid=" + idUuid +
                ", email='" + email + '\'' +
                ", registration='" + registration + '\'' +
                ", needsVerification=" + needsVerification +
                ", createdOn=" + createdOn +
                ", lastSeen=" + lastSeen +
                ", rememberToken='" + rememberToken + '\'' +
                ", isLocked=" + isLocked +
                ", isDeleted=" + isDeleted +
                ", account=" + account +
                '}';
    }

}
