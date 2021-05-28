package models.users;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.OneToOne;
import java.net.URL;
import java.util.UUID;

@Entity
public class Account {

    @Id
    Long id;

    UUID idUuid = UUID.randomUUID();

    @OneToOne
    User user;

    String firstName;

    String lastName;

    String locationCity;

    String locationRegion;

    String locationCountry;

    URL avatarUrl;

    boolean isDeleted;

    @Override
    public final String toString() {
        return "Account{" +
                "id=" + id +
                ", idUuid=" + idUuid +
                ", user=" + user +
                ", firstName='" + firstName + '\'' +
                ", lastName='" + lastName + '\'' +
                ", locationCity='" + locationCity + '\'' +
                ", locationRegion='" + locationRegion + '\'' +
                ", locationCountry='" + locationCountry + '\'' +
                ", avatarUrl=" + avatarUrl +
                ", isDeleted=" + isDeleted +
                '}';
    }


}
