package models.user;

import io.ebean.Finder;
import io.ebean.Model;
import io.ebean.annotation.Length;
import io.ebean.annotation.NotNull;
import io.ebean.annotation.SoftDelete;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;
import java.net.URL;
import java.util.UUID;

@Entity
public class Account extends Model {

    @Id
    Long id;

    @NotNull
    UUID idUuid = UUID.randomUUID();

    @NotNull @OneToOne
    User user;

    @NotNull @Length(value = 255)
    String firstName;

    public Account setFirstName(String firstName) {
        this.firstName = firstName;
        return this;
    }

    public Account setLastName(String lastName) {
        this.lastName = lastName;
        return this;
    }

    public Account setLocationCity(String locationCity) {
        this.locationCity = locationCity;
        return this;
    }

    public Account setLocationRegion(String locationRegion) {
        this.locationRegion = locationRegion;
        return this;
    }

    public Account setLocationCountry(String locationCountry) {
        this.locationCountry = locationCountry;
        return this;
    }

    public Account setAvatarUrl(URL avatarUrl) {
        this.avatarUrl = avatarUrl;
        return this;
    }

    @NotNull @Length(value = 255)
    String lastName;

    @Length(value = 50)
    String locationCity;

    @Length(value = 50)
    String locationRegion;

    @Length(value = 50)
    String locationCountry;

    @NotNull
    URL avatarUrl;

    @NotNull @SoftDelete
    boolean isDeleted;

    public static final Finder<Long, Account> find = new Finder<>(Account.class);

    
}
