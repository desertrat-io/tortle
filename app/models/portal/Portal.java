package models.portal;

import models.users.User;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.OneToOne;
import java.sql.Timestamp;
import java.util.Objects;
import java.util.UUID;

@Entity
public class Portal {

    @Id
    long id;

    UUID idUuid = UUID.randomUUID();

    String portalTitle;

    String portalDescription = "";

    @OneToOne
    User owner;

    // provider is just a stub right now
    //@ManyToOne(optional = false)

    Provider provider;

    Timestamp createdOn;

    Integer portalWidth;

    Integer horizontalOrder;

    boolean isDeleted;

    @Override
    public final String toString() {
        return "Portal{" +
                "id=" + id +
                ", idUuid=" + idUuid +
                ", portalTitle='" + portalTitle + '\'' +
                ", portalDescription='" + portalDescription + '\'' +
                ", owner=" + owner +
                ", provider=" + provider +
                ", createdOn=" + createdOn +
                ", portalWidth=" + portalWidth +
                ", horizontalOrder=" + horizontalOrder +
                ", isDeleted=" + isDeleted +
                '}';
    }

    @Override
    public final boolean equals(final Object o) {
        if (this == o) return true;
        if (o == null || this.getClass() != o.getClass()) return false;
        final Portal portal = (Portal) o;
        return isDeleted == portal.isDeleted &&
                id == portal.id &&
                idUuid.equals(portal.idUuid) &&
                portalTitle.equals(portal.portalTitle) &&
                Objects.equals(portalDescription, portal.portalDescription) &&
                owner.equals(portal.owner) &&
                provider.equals(portal.provider) &&
                createdOn.equals(portal.createdOn) &&
                Objects.equals(portalWidth, portal.portalWidth) &&
                Objects.equals(horizontalOrder, portal.horizontalOrder);
    }

    @Override
    public final int hashCode() {
        return Objects.hash(id, idUuid, portalTitle, portalDescription, owner, provider, createdOn, portalWidth, horizontalOrder, isDeleted);
    }
}
