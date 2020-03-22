package models.portal;

import io.ebean.Finder;
import io.ebean.Model;
import io.ebean.annotation.Length;
import io.ebean.annotation.NotNull;
import io.ebean.annotation.SoftDelete;
import models.user.User;
import org.springframework.lang.NonNull;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.OneToOne;
import java.sql.Timestamp;
import java.util.UUID;

@Entity
public class Portal extends Model {

    @Id
    Long id;

    @NotNull
    UUID idUuid;

    @Length(value = 1000) @NotNull
    String portalTitle;

    @Length(value = 1000) @NotNull
    String portalDescription = "";

    @NotNull @OneToOne
    User owner;

    // provider is just a stub right now
    //@ManyToOne(optional = false)
    Provider provider = null;

    @NotNull
    Timestamp createdOn = null;

    Integer portalWidth = null;

    Integer horizontalOrder;

    @SoftDelete @NotNull
    boolean isDeleted;

    public Portal setPortalTitle(String portalTitle) {
        this.portalTitle = portalTitle;
        return this;
    }

    public Portal setPortalDescription(String portalDescription) {
        this.portalDescription = portalDescription;
        return this;
    }

    public Portal setPortalWidth(Integer portalWidth) {
        this.portalWidth = portalWidth;
        return this;
    }

    public Portal setHorizontalOrder(Integer horizontalOrder) {
        this.horizontalOrder = horizontalOrder;
        return this;
    }

    public static final Finder<Long, Portal> find = new Finder<>(Portal.class);
}
