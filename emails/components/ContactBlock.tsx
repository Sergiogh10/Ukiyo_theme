import { Section, Text, Link } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface ContactBlockProps {
  supportEmail?: string;
  supportPhone?: string;
}

export const ContactBlock = ({
  supportEmail = 'info@viajesukiyo.com',
  supportPhone = '+34 635 300 441'
}: ContactBlockProps) => {
  return (
    <Section style={containerStyle}>
      <Text style={titleStyle}>¿Tienes alguna duda?</Text>
      <Text style={textStyle}>
        Estamos aquí para ayudarte en cualquier paso del proceso. Responde a este correo, escríbenos a <Link href={`mailto:${supportEmail}`} style={linkStyle}>{supportEmail}</Link> o llámanos al <Link href={`tel:${supportPhone}`} style={linkStyle}>{supportPhone}</Link>.
      </Text>
    </Section>
  );
};

const containerStyle = {
  backgroundColor: theme.colors.accentSoft,
  padding: '24px',
  borderRadius: theme.radius.md,
  margin: '32px 0',
};

const titleStyle = {
  margin: '0 0 8px 0',
  fontSize: '16px',
  fontWeight: '600',
  color: theme.colors.primaryDark,
  fontFamily: theme.fonts.main,
};

const textStyle = {
  margin: '0',
  fontSize: '14px',
  lineHeight: '22px',
  color: theme.colors.textMain,
  fontFamily: theme.fonts.main,
};

const linkStyle = {
  color: theme.colors.primaryDark,
  fontWeight: '500',
  textDecoration: 'underline',
};

export default ContactBlock;
