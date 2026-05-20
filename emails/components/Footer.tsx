import { Section, Text, Link } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface FooterProps {
  supportEmail?: string;
  supportPhone?: string;
}

export const Footer = ({ supportEmail = 'contact@viajesukiyo.com', supportPhone = '+34 600 000 000' }: FooterProps) => {
  return (
    <Section style={footerContainer}>
      <Text style={footerText}>
        Diseñado por <strong>Viajes UKIYO</strong>.
      </Text>
      <Text style={footerLinks}>
        <Link href="https://viajesukiyo.com" style={linkStyle}>Web</Link>
        {' • '}
        <Link href="https://instagram.com/viajes.ukiyo" style={linkStyle}>Instagram</Link>
        {' • '}
        <Link href={`mailto:${supportEmail}`} style={linkStyle}>Contacto</Link>
      </Text>
      <Text style={copyright}>
        © {new Date().getFullYear()} UKIYO. Todos los derechos reservados.
      </Text>
    </Section>
  );
};

const footerContainer = {
  padding: '40px 48px',
  textAlign: 'center' as const,
  backgroundColor: theme.colors.surface,
  borderTop: `1px solid ${theme.colors.border}`,
};

const footerText = {
  fontSize: '13px',
  lineHeight: '20px',
  color: theme.colors.textSecondary,
  margin: '0 0 12px 0',
};

const footerLinks = {
  fontSize: '13px',
  color: theme.colors.primaryDark,
  margin: '0 0 16px 0',
};

const linkStyle = {
  color: theme.colors.primaryDark,
  textDecoration: 'none',
  fontWeight: '500',
};

const copyright = {
  fontSize: '12px',
  color: '#A0A0A0',
  margin: '0',
};

export default Footer;
