package models.users;

import lib.annotations.NonInterface;

import javax.persistence.*;
import java.math.BigDecimal;
import java.sql.Timestamp;
import java.util.UUID;

@Entity
@NonInterface
public class Registration {

    @Id @GeneratedValue
    long id;

    @Column(unique = true)
    UUID idUuid = UUID.randomUUID();

    @OneToOne(mappedBy = "registration")
    User user;


    String token;

    boolean isVerified = false;

    boolean isExpired = false;


    String ip;


    BigDecimal location;


    String userAgent;


    Timestamp createdOn = new java.sql.Timestamp(System.currentTimeMillis());


    Timestamp updatedOn = new java.sql.Timestamp(System.currentTimeMillis());

    Timestamp verifiedAt;


    boolean isDeleted;

    Timestamp deletedAt;

    @Override
    public String toString() {
        return "Registration{" +
                "id=" + id +
                ", idUuid=" + idUuid +
                ", userId=" + user.email +
                ", token='" + token + '\'' +
                ", isVerified=" + isVerified +
                ", isExpired=" + isExpired +
                ", ip='" + ip + '\'' +
                ", location=" + location +
                ", userAgent='" + userAgent + '\'' +
                ", createdOn=" + createdOn +
                ", updatedOn=" + updatedOn +
                ", verifiedAt=" + verifiedAt +
                ", isDeleted=" + isDeleted +
                ", deletedAt=" + deletedAt +
                '}';
    }
}
